<?php

namespace App\Http\Controllers;

use App\Http\Requests\QorageJsonRequest;
use App\Models\Qorage\BaseMain;
use App\Models\Qorage\BaseRow;
use App\Services\QorageService;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class QorageController extends Controller
{
    /**
     * Сохраняет конфигурационную структуру
     * @param QorageJsonRequest $request
     * @return mixed
     */
    public function createByJson(QorageJsonRequest $request)
    {
        $type = $request->get('type');
        $class = QorageService::getClassType($type);

        foreach ($class::gates() as $gate) {
            $this->authorize($gate);
        }

        $data = $request->get('data');
        $main_id = $class::createGetMainId($data);

        return response()->json([
            'data' => [
                'id' => $main_id,
                'url' => route('qorage.csv.get', [$type, $main_id])
            ]
        ]);
    }

    /**
     * Возвращает последнюю актуальную структуру как csv-файл для excel
     * @param $type
     * @param $id
     * @return mixed
     */
    public function getAsCsv($type, $id)
    {
        $class = QorageService::getClassType($type);
        if ($class === null) {
            throw new BadRequestHttpException();
        }

        /**
         * @var $main BaseMain
         */
        $main = $class::findOrFail($id);

        $output_encoding = 'cp1251';
        $file_name = $type . '-' . $id;
        $extension = 'csv';

        /** @var BinaryFileResponse $maat_is_shitfucker */
        $maat_is_shitfucker = \Excel::download($main, $file_name.'.'.$extension, \Maatwebsite\Excel\Excel::CSV);
        $result = mb_convert_encoding(file_get_contents($maat_is_shitfucker->getFile()->getPathname()), $output_encoding, 'utf-8');

        return response($result, 200, [
            'Content-Type' => 'application/csv; charset='.$output_encoding,
            'Content-Disposition' => 'attachment; filename="'.$file_name.'.'.$extension.'"'
        ]);
    }
}
