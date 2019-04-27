<?php
    /**
     * @param int $order_id идентификатор заказа
     * @param string $transaction_id идентификатор транзакции cloudpayments
     * @param int $client_id идентификатор клиента, пришедший из платежа
     * @param string $card_number номер карты, не полный, вида 123456******1234
     * @param string $holder_name фио держателя карты
     * @param int $client_ip_address ip-адрес клиента
     * @param float $amount сумма оплаты
     */
    public static function payOrder($order_id, $transaction_id=false, $client_id, $card_number, $holder_name, $client_ip_address=false, $amount)
    {
        Debug::debug("Запустился payOrder($order_id, $transaction_id, $client_id, $card_number, $holder_name, $client_ip_address, $amount)");

        if(!$transaction_id){//если заказ без обработки платежной системой
            $transaction_id = 'nopayment.' . $order_id . '.' . time();
        }
        if(!$client_ip_address){//если заказ без обработки платежной системой
            $client_ip_address = CloudPaymentsUtils::getIP();
        }
        
        $payment = new ClientPayments();
        $payment->client_id = $client_id;
        $payment->pay_order = $order_id;//идентифкатор заказа платежа
        $payment->card_number = $card_number;
        $payment->card_holder = $holder_name;
        $payment->ip = $client_ip_address;
        $payment->amount = $amount;//intval($request->Amount)/100
        $payment->created_at = \Carbon\Carbon::now();
        $payment->transaction_id = $transaction_id;//идентификатор транзакции cloudpayments
        $payment->save();

        Debug::debug('Создан объект ClientPayments, id=' . $payment->id);

        $payed_amount = (int)ClientPayments::where('pay_order', $order_id)->sum('amount');

        //TODO: дюкан-код, вроде, не нужен, но я не рискнул убирать
        if(mb_substr($order_id, 0, 1) == 'д'){
            Debug::debug('Обработка ДЮКАН-заказа');
            $orderParentId = mb_substr($order_id, 1);
            $orders = Order::where('parent_id', $orderParentId)->get();
        }else{
            Debug::debug('Обработка обычного заказа');
            if(!is_numeric($order_id)){
                throw new PaymentException('Номер заказа должен быть числом');
            }

            Debug::debug('Поиск заказа ' . $order_id);
            $order = Order::find($order_id);
            if(!$order){
                throw new PaymentException('Нет заказа');
            }
            $orders = [$order];
        }

        if(!count($orders)){
            throw new PaymentException('Не найдены заказы');
        }

        $client_id = $orders[0]->client_id;//id клиента, который был использован при создании заказа

        $cost = 0;
        foreach($orders as $order){
            $cost += (int)$order->costall;
        }

        $cost_remain = $cost - $payed_amount;
        Debug::debug('Недоплачено $cost_remain = ' . $cost_remain . 'руб');
        $is_full_cost_payment = $cost_remain == 0;//была оплачена вся сумма

        if($is_full_cost_payment){
            Debug::debug('Присвоение статуса оплаченного');
            foreach($orders as $order){
                $order->is_payed = true;
                $order->payment_type_id = 2;
                $order->save();

                $check_result = $order->sendCheck();
                if($check_result['success']) {
                    // чек создан
                } else {
                    // чек не создан
                    // $check_result['error'] - ошибка
                    throw new PaymentException('Не смогли создать чек: '.$check_result['error']);
                }

            }
            Debug::debug('Заказу присвоен статус оплаченного');
        }

        self::sendPaySuccessMail($order_id, $client_id, $cost, $amount, !$is_full_cost_payment);
    }
