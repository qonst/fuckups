@extends('contract_documents.layouts.main')
@section('svg')
    @include('contract_documents.partials.text',['width'=>715,'left'=>1582,'top'=>361,'font_size'=>24,'line_height'=>30,'text'=>$insurant['address'].' / '.$insurant['phone']])
    @include('contract_documents.partials.text',['width'=>715,'left'=>1584,'top'=>572,'font_size'=>24,'line_height'=>23,'text'=>$terms_proceed_days_info])
    @include('contract_documents.partials.text',['width'=>365,'left'=>1447,'top'=>1506,'font_size'=>24,'line_height'=>23,'text_align'=>'center','text'=>$coating_expansion['danger_work']['name']])
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="2480" height="3508" viewBox="0 0 2480 3508" fill="none">
        <g clip-path="url(#clip0)">
            <rect width="2480" height="3508" fill="white"/>
            <g id="signature">
                <g id="2">
                    <g id="sgn">
                        <g>
                            <rect width="503" height="497" transform="translate(1577.23 3000) rotate(2.55149)" fill="url(#pattern0)"/>
                        </g>
                        <rect width="260" height="280" transform="translate(1589.23 3200)" fill="url(#pattern1)"/>
                    </g>
                    <text transform="translate(1914 3442)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">/ Алякина Д.П.</tspan></text>
                    <path id="Rectangle 3" fill-rule="evenodd" clip-rule="evenodd" d="M0 0H433V2H0V0Z" transform="translate(1437 3465)" fill="#181920" fill-opacity="0.1"/>
                    <text transform="translate(1437 3260)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="36" font-weight="500" letter-spacing="0px"><tspan x="0" y="34.2773">Подпись Страховщика / Signature of Insurer</tspan></text>
                </g>
                <g id="1">
                    <text transform="translate(607 3442)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">/ {{$insurant['assignee_name']}}</tspan></text>
                    <path id="Rectangle 3_2" fill-rule="evenodd" clip-rule="evenodd" d="M0 0H433V2H0V0Z" transform="translate(130 3465)" fill="#181920" fill-opacity="0.1"/>
                    <text transform="translate(130 3319)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="18" letter-spacing="0px"><tspan x="0" y="17.1387">Подтверждаю, </tspan><tspan x="135.759" y="17.1387">что </tspan><tspan x="171.709" y="17.1387">с </tspan><tspan x="188.147" y="17.1387">вышеуказанными </tspan><tspan x="349.798" y="17.1387">Правилами </tspan><tspan x="456.324" y="17.1387">страхования </tspan><tspan x="573.925" y="17.1387">ознакомлен </tspan><tspan x="686.533" y="17.1387">и </tspan><tspan x="703.622" y="17.1387">их </tspan><tspan x="730.343" y="17.1387">получил. </tspan><tspan x="814.985" y="17.1387">Условия </tspan><tspan x="893.667" y="17.1387">страхования, </tspan><tspan x="1016.61" y="17.1387">содержащиеся </tspan><tspan x="1156.43" y="17.1387">в </tspan><tspan x="1172.48" y="17.1387">Правилах </tspan><tspan x="0" y="45.1387">страхования, </tspan><tspan x="124.3" y="45.1387">настоящем </tspan><tspan x="230.741" y="45.1387">Полисе </tspan><tspan x="304.381" y="45.1387">(договоре </tspan><tspan x="401.752" y="45.1387">страхования), </tspan><tspan x="532.925" y="45.1387">приложениях </tspan><tspan x="659.422" y="45.1387">и  </tspan><tspan x="685.414" y="45.1387">дополнительных </tspan><tspan x="840.089" y="45.1387">соглашениях </tspan><tspan x="962.895" y="45.1387">к </tspan><tspan x="980.232" y="45.1387">нему </tspan><tspan x="1032.5" y="45.1387">(если </tspan><tspan x="1088.93" y="45.1387">таковые </tspan><tspan x="1168.81" y="45.1387">имеются), </tspan><tspan x="0" y="73.1387">мне </tspan><tspan x="39.8496" y="73.1387">полностью </tspan><tspan x="140.801" y="73.1387">разъяснены </tspan><tspan x="251.578" y="73.1387">и </tspan><tspan x="267.557" y="73.1387">понятны. </tspan><tspan x="352.424" y="73.1387">С </tspan><tspan x="370.564" y="73.1387">условиями </tspan><tspan x="471.48" y="73.1387">страхования </tspan><tspan x="587.971" y="73.1387">и </tspan><tspan x="603.949" y="73.1387">выплаты </tspan><tspan x="684.773" y="73.1387">страхового </tspan><tspan x="789.574" y="73.1387">возмещения </tspan><tspan x="905.537" y="73.1387">ознакомлен </tspan><tspan x="1017.04" y="73.1387">и </tspan><tspan x="1033.01" y="73.1387">согласен.</tspan></text>
<text transform="translate(130 3260)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="36" font-weight="500" letter-spacing="0px"><tspan x="0" y="34.2773">Подпись Страхователя / Signature of Policy holder</tspan></text>
                </g>
            </g>
            <g id="remember">
                <path id="Rectangle" fill-rule="evenodd" clip-rule="evenodd" d="M0 2C0 0.895431 0.895431 0 2 0H2398C2399.1 0 2400 0.895431 2400 2V924C2400 925.105 2399.1 926 2398 926H2C0.895431 926 0 925.105 0 924V2Z" transform="translate(40 1892)" fill="#F73A3B" fill-opacity="0.05"/>
                <text transform="translate(130 2661)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="20" letter-spacing="0px"><tspan x="0" y="19.043">Оказание </tspan><tspan x="105.413" y="19.043">бесплатной </tspan><tspan x="231.842" y="19.043">медицинской </tspan><tspan x="375.575" y="19.043">помощи </tspan><tspan x="466.027" y="19.043">гарантировано </tspan><tspan x="625.073" y="19.043">только </tspan><tspan x="701.482" y="19.043">при </tspan><tspan x="748.341" y="19.043">предварительном </tspan><tspan x="935.492" y="19.043">согласовании </tspan><tspan x="1082.47" y="19.043">с </tspan><tspan x="1104.37" y="19.043">сервисной </tspan><tspan x="1220.79" y="19.043">компанией </tspan><tspan x="1339.64" y="19.043">«САВИТАР </tspan><tspan x="1457.71" y="19.043">ГРУП». </tspan><tspan x="1539.22" y="19.043">При </tspan><tspan x="1589.07" y="19.043">обращении </tspan><tspan x="1712" y="19.043">за </tspan><tspan x="1744.29" y="19.043">медицинской </tspan><tspan x="1888.02" y="19.043">помощью </tspan><tspan x="1992.61" y="19.043">без </tspan><tspan x="2037.4" y="19.043">предварительного </tspan><tspan x="0" y="47.043">согласования </tspan><tspan x="140.625" y="47.043">с </tspan><tspan x="157.656" y="47.043">сервисной </tspan><tspan x="269.219" y="47.043">компанией </tspan><tspan x="383.203" y="47.043">страховая </tspan><tspan x="488.574" y="47.043">компания </tspan><tspan x="589.453" y="47.043">не </tspan><tspan x="618.672" y="47.043">гарантирует </tspan><tspan x="745.879" y="47.043">компенсацию </tspan><tspan x="887.363" y="47.043">всех </tspan><tspan x="937.09" y="47.043">Ваших </tspan><tspan x="1006.46" y="47.043">расходов.
                    </tspan><tspan x="0" y="75.043">Если </tspan><tspan x="54.2055" y="75.043">Вы </tspan><tspan x="88.8211" y="75.043">самостоятельно </tspan><tspan x="255.546" y="75.043">обратились </tspan><tspan x="377.896" y="75.043">за </tspan><tspan x="406.711" y="75.043">медицинской </tspan><tspan x="546.971" y="75.043">помощью </tspan><tspan x="648.091" y="75.043">и </tspan><tspan x="667.237" y="75.043">оплатили </tspan><tspan x="766.795" y="75.043">связанные </tspan><tspan x="878.344" y="75.043">с </tspan><tspan x="896.768" y="75.043">этим </tspan><tspan x="951.911" y="75.043">расходы, </tspan><tspan x="1048.42" y="75.043">возьмите </tspan><tspan x="1147.59" y="75.043">все </tspan><tspan x="1188.49" y="75.043">документы, </tspan><tspan x="1310.24" y="75.043">подтверждающие </tspan><tspan x="1493.33" y="75.043">это, </tspan><tspan x="1538.47" y="75.043">такие </tspan><tspan x="1601.27" y="75.043">как: </tspan><tspan x="1646.94" y="75.043">выписку </tspan><tspan x="1736.07" y="75.043">из </tspan><tspan x="1765.76" y="75.043">истории </tspan><tspan x="1854.11" y="75.043">болезни, </tspan><tspan x="1948.9" y="75.043">подтверждающую </tspan><tspan x="2135.14" y="75.043">диагноз, </tspan><tspan x="0" y="103.043">дату </tspan><tspan x="50.2734" y="103.043">обращения </tspan><tspan x="166.855" y="103.043">и </tspan><tspan x="184.609" y="103.043">перечень </tspan><tspan x="282.715" y="103.043">оказанных </tspan><tspan x="392.812" y="103.043">услуг; </tspan><tspan x="458.359" y="103.043">рецепты; </tspan><tspan x="554.043" y="103.043">подлинники </tspan><tspan x="678.398" y="103.043">документов, </tspan><tspan x="806.699" y="103.043">подтверждающих </tspan><tspan x="987.48" y="103.043">оплату </tspan><tspan x="1060.92" y="103.043">медицинских </tspan><tspan x="1198.96" y="103.043">услуг </tspan><tspan x="1258.57" y="103.043">и </tspan><tspan x="1276.33" y="103.043">медикаментов </tspan><tspan x="1426.04" y="103.043">и </tspan><tspan x="1443.79" y="103.043">т.п.
                    </tspan></text>
<text transform="translate(131 2603)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Italic" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">* Получите и сохраните документ, подтверждающий оплату телефонного звонка в «САВИТАР ГРУП» и по возвращении Страховая компания возместит эти расходы.</tspan></text>
                <g id="phonews">
                    <g id="Group 2">
                        <text id="Insuranse risks" transform="translate(130 2273)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Австрия:
                            </tspan><tspan x="0" y="72.8516">Беларусь:
                            </tspan><tspan x="0" y="122.852">Болгария:
                            </tspan><tspan x="0" y="172.852">Германия:
                            </tspan><tspan x="0" y="222.852">Греция:
                            </tspan><tspan x="0" y="272.852">Египет:
                            </tspan><tspan x="0" y="322.852">
                            </tspan></text>
<text id="Insuranse risks_2" transform="translate(320 2273)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"></text>
<text id="Insuranse risks_3" transform="translate(320 2523)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">+20 10 937 756 77; +20 10 937 759 77
    </tspan><tspan x="0" y="57.8516">+20 10 937 773 11; +20 65 34 633 09</tspan></text>
                    </g>
                    <g id="Group 2_2">
                        <text id="Insuranse risks_4" transform="translate(951 2273)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Израиль:
                            </tspan><tspan x="0" y="72.8516">Испания:
                            </tspan><tspan x="0" y="122.852">Италия:
                            </tspan><tspan x="0" y="172.852">Кипр:
                            </tspan><tspan x="0" y="222.852">Китай:
                            </tspan><tspan x="0" y="272.852">Польша
                            </tspan></text>
<text id="Insuranse risks_5" transform="translate(1141 2273)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"></text>
                    </g>
                    <g id="Group">
                        <text id="Insuranse risks_6" transform="translate(1649 2273)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">США:
                            </tspan><tspan x="0" y="72.8516">Тайланд:
                            </tspan><tspan x="0" y="122.852">Турция:
                            </tspan><tspan x="0" y="172.852">Украина:
                            </tspan><tspan x="0" y="222.852">Чехия:</tspan></text>
<text id="Insuranse risks_7" transform="translate(1839 2273)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"></text>
                    </g>
                </g>
                <g transform="translate(130 2185)">
                    <text fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="22" font-weight="500" letter-spacing="0px"><tspan x="0" y="20.9473">ВНИМАНИЕ! </tspan></text>
<text fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="22" font-weight="500" letter-spacing="0px"><tspan x="144.525" y="20.9473">если Вы находитесь на территории страны, указанной ниже, звоните по телефону в стране пребывания. Перед звонком уточните правила набора и коды доступа к международной </tspan><tspan x="0" y="52.9473">линии из Вашего отеля:</tspan></text>
                </g>
                <path id="divider" fill-rule="evenodd" clip-rule="evenodd" d="M0 0H2220V2H0V0Z" transform="translate(130 2153)" fill="#181920" fill-opacity="0.1"/>
                <g id="phonews_2">
                    <g id="Insuranse risks_8" transform="translate(130 2090)">
                        <text fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Bold" font-size="24" font-weight="bold" letter-spacing="0px"><tspan x="395.156" y="22.8516"></tspan></text>
<text fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Bold" font-size="24" font-weight="bold" letter-spacing="0px"><tspan x="0" y="22.8516">Телефон call-центра в Москве: </tspan></text>
                    </g>
                    <g id="Insuranse risks_9" transform="translate(951 2090)">
                        <text fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Bold" font-size="24" font-weight="bold" letter-spacing="0px"><tspan x="867.562" y="22.8516"></tspan></text>
<text fill="#181920" fill-opacity="0.5" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Bold" font-size="24" font-weight="bold" letter-spacing="0px"><tspan x="861.375" y="22.8516"> </tspan></text>
<text fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Bold" font-size="24" font-weight="bold" letter-spacing="0px"><tspan x="0" y="22.8516">Круглосуточный центр (бесплатные звонки на территории России):</tspan></text>
                    </g>
                </g>
                <text transform="translate(130 2002)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="22" font-weight="500" letter-spacing="0px"><tspan x="0" y="20.9473">При </tspan><tspan x="52.8929" y="20.9473">возникновении </tspan><tspan x="232.178" y="20.9473">необходимости </tspan><tspan x="414.429" y="20.9473">в </tspan><tspan x="435.503" y="20.9473">медицинской </tspan><tspan x="594.722" y="20.9473">помощи, </tspan><tspan x="700.445" y="20.9473">прежде </tspan><tspan x="793.858" y="20.9473">чем </tspan><tspan x="845.418" y="20.9473">предпринять </tspan><tspan x="998.214" y="20.9473">какие-либо </tspan><tspan x="1135" y="20.9473">действия, </tspan><tspan x="1253.12" y="20.9473">в </tspan><tspan x="1274.2" y="20.9473">обязательном </tspan><tspan x="1439.11" y="20.9473">порядке </tspan><tspan x="1539.4" y="20.9473">необходимо </tspan><tspan x="1684.35" y="20.9473">обратиться </tspan><tspan x="1819.51" y="20.9473">в </tspan><tspan x="1840.58" y="20.9473">круглосуточный </tspan><tspan x="2029.26" y="20.9473">центр </tspan><tspan x="2103.63" y="20.9473">сервисной </tspan><tspan x="0" y="52.9473">компании </tspan><tspan x="115.457" y="52.9473">«САВИТАР </tspan><tspan x="242.344" y="52.9473">ГРУП» </tspan><tspan x="321.385" y="52.9473">по </tspan><tspan x="354.299" y="52.9473">телефонам </tspan><tspan x="483.635" y="52.9473">*:</tspan></text>
<text transform="translate(130 1937)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="36" font-weight="500" letter-spacing="0px"><tspan x="0" y="34.2773">Памятка застрахованному</tspan></text>
            </g>
            <g id="copyright">
                <text transform="translate(130 1648)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="18" letter-spacing="0px"><tspan x="0" y="17.1387">1. </tspan><tspan x="18.7708" y="17.1387">Страхователь </tspan><tspan x="145.946" y="17.1387">во </tspan><tspan x="171.994" y="17.1387">исполнении </tspan><tspan x="284.175" y="17.1387">требований </tspan><tspan x="394.545" y="17.1387">Федерального </tspan><tspan x="528.259" y="17.1387">Закона </tspan><tspan x="595.897" y="17.1387">от </tspan><tspan x="620.627" y="17.1387">07.08.2001г. </tspan><tspan x="731.085" y="17.1387">"О </tspan><tspan x="758.487" y="17.1387">противодействии </tspan><tspan x="919.359" y="17.1387">легализации </tspan><tspan x="1037.67" y="17.1387">(отмыванию) </tspan><tspan x="1158.47" y="17.1387">доходов, </tspan><tspan x="1242.14" y="17.1387">полученных </tspan><tspan x="1353.83" y="17.1387">преступым </tspan><tspan x="1457.43" y="17.1387">путем, </tspan><tspan x="1521.24" y="17.1387">и </tspan><tspan x="1537.6" y="17.1387">финансированию </tspan><tspan x="1697.96" y="17.1387">терроризма" </tspan><tspan x="1818.77" y="17.1387">обязуется </tspan><tspan x="1912.27" y="17.1387">предоставить </tspan><tspan x="2039.74" y="17.1387">Страховщику </tspan><tspan x="2163.68" y="17.1387">по </tspan><tspan x="2190.63" y="17.1387">его </tspan><tspan x="0" y="38.1387">запросу </tspan><tspan x="77.2383" y="38.1387">документы </tspan><tspan x="180.211" y="38.1387">и </tspan><tspan x="196.189" y="38.1387">сведения </tspan><tspan x="284.379" y="38.1387">для </tspan><tspan x="320.467" y="38.1387">проведения </tspan><tspan x="431.033" y="38.1387">идентификации </tspan><tspan x="575.965" y="38.1387">Страхователя, </tspan><tspan x="708.363" y="38.1387">его </tspan><tspan x="742.816" y="38.1387">представителя, </tspan><tspan x="884.953" y="38.1387">выгодоприобретателя, </tspan><tspan x="1091.97" y="38.1387">бенефициарного </tspan><tspan x="1247.55" y="38.1387">владельца, </tspan><tspan x="1350.39" y="38.1387">а </tspan><tspan x="1365.57" y="38.1387">также </tspan><tspan x="1424" y="38.1387">в </tspan><tspan x="1438.95" y="38.1387">случае </tspan><tspan x="1505.25" y="38.1387">необходимости </tspan><tspan x="1648.99" y="38.1387">обновления </tspan><tspan x="1759.2" y="38.1387">данных </tspan><tspan x="1829.39" y="38.1387">сведений.
                    </tspan><tspan x="0" y="59.1387">2. </tspan><tspan x="21.041" y="59.1387">Стороны, </tspan><tspan x="109.23" y="59.1387">заключившие </tspan><tspan x="235.143" y="59.1387">договор, </tspan><tspan x="317.707" y="59.1387">согласны, </tspan><tspan x="411.188" y="59.1387">что </tspan><tspan x="446.027" y="59.1387">использование </tspan><tspan x="585.475" y="59.1387">факсимильного </tspan><tspan x="729.123" y="59.1387">воспроизведения </tspan><tspan x="890.912" y="59.1387">подписи </tspan><tspan x="971.139" y="59.1387">уполномоченного  </tspan><tspan x="1140.73" y="59.1387">лица </tspan><tspan x="1188.3" y="59.1387">признается </tspan><tspan x="1294.56" y="59.1387">как </tspan><tspan x="1329.06" y="59.1387">оригинальная </tspan><tspan x="1457.26" y="59.1387">подпись </tspan><tspan x="1535.89" y="59.1387">уполномоченного </tspan><tspan x="1700.4" y="59.1387">лица.
                    </tspan><tspan x="0" y="80.1387">3. </tspan><tspan x="24.8572" y="80.1387">Настоящим </tspan><tspan x="135.812" y="80.1387">Страхователь </tspan><tspan x="266.366" y="80.1387">подтверждает </tspan><tspan x="401.597" y="80.1387">свое </tspan><tspan x="451.731" y="80.1387">согласие </tspan><tspan x="541.417" y="80.1387">(и </tspan><tspan x="568.031" y="80.1387">подтверждает </tspan><tspan x="703.262" y="80.1387">наличие </tspan><tspan x="785.863" y="80.1387">согласия </tspan><tspan x="874.652" y="80.1387">лиц, </tspan><tspan x="921.57" y="80.1387">указанных </tspan><tspan x="1023.56" y="80.1387">в </tspan><tspan x="1042.26" y="80.1387">Полисе) </tspan><tspan x="1124.07" y="80.1387">на </tspan><tspan x="1153.78" y="80.1387">обработку </tspan><tspan x="1255.14" y="80.1387">Страховщиком </tspan><tspan x="1396.79" y="80.1387">в </tspan><tspan x="1415.49" y="80.1387">порядке, </tspan><tspan x="1502.63" y="80.1387">установленном </tspan><tspan x="1648" y="80.1387">Правилами </tspan><tspan x="1757.18" y="80.1387">страхования, </tspan><tspan x="1882.78" y="80.1387">персональных </tspan><tspan x="2018.73" y="80.1387">данных </tspan><tspan x="2092.68" y="80.1387">Страхователя, </tspan><tspan x="0" y="101.139">осуществления </tspan><tspan x="142.463" y="101.139">страхования </tspan><tspan x="259.191" y="101.139">по </tspan><tspan x="285.99" y="101.139">договору </tspan><tspan x="373.397" y="101.139">страхования, </tspan><tspan x="495.469" y="101.139">в </tspan><tspan x="510.649" y="101.139">том </tspan><tspan x="549.049" y="101.139">числе </tspan><tspan x="606.609" y="101.139">в </tspan><tspan x="621.789" y="101.139">статистических </tspan><tspan x="766.958" y="101.139">целях, </tspan><tspan x="828.491" y="101.139">в </tspan><tspan x="843.671" y="101.139">целях </tspan><tspan x="899.86" y="101.139">проведения </tspan><tspan x="1010.66" y="101.139">анализа </tspan><tspan x="1087.86" y="101.139">страховых </tspan><tspan x="1185.71" y="101.139">рисков, </tspan><tspan x="1258.33" y="101.139">а </tspan><tspan x="1273.76" y="101.139">также </tspan><tspan x="1332.43" y="101.139">в </tspan><tspan x="1347.61" y="101.139">целях </tspan><tspan x="1403.8" y="101.139">информирования </tspan><tspan x="1563.64" y="101.139">Страхователя  </tspan><tspan x="1696.25" y="101.139">о </tspan><tspan x="1712.38" y="101.139">других </tspan><tspan x="1778.38" y="101.139">продуктах </tspan><tspan x="1875.16" y="101.139">и </tspan><tspan x="1891.37" y="101.139">услугах </tspan><tspan x="1964.74" y="101.139">Страховщика,  </tspan><tspan x="2099.44" y="101.139">на </tspan><tspan x="2125.62" y="101.139">получение </tspan><tspan x="0" y="122.139">рекламных </tspan><tspan x="103.57" y="122.139">и </tspan><tspan x="119.549" y="122.139">информационных </tspan><tspan x="281.971" y="122.139">рассылок </tspan><tspan x="372.621" y="122.139">на </tspan><tspan x="398.566" y="122.139">указанный </tspan><tspan x="498.059" y="122.139">выше </tspan><tspan x="550.986" y="122.139">адрес  </tspan><tspan x="614.145" y="122.139">и/или </tspan><tspan x="668.32" y="122.139">номер </tspan><tspan x="730.125" y="122.139">мобильного </tspan><tspan x="841.553" y="122.139">телефона </tspan><tspan x="931.412" y="122.139">(путем </tspan><tspan x="996.363" y="122.139">отправки </tspan><tspan x="1083.18" y="122.139">sms).
                    </tspan><tspan x="0" y="143.139">4. </tspan><tspan x="23.01" y="143.139">Согласно </tspan><tspan x="113.573" y="143.139">п.10.8.22 </tspan><tspan x="197.069" y="143.139">Правил </tspan><tspan x="269.544" y="143.139">страхования </tspan><tspan x="387.652" y="143.139">не </tspan><tspan x="415.566" y="143.139">покрываются </tspan><tspan x="539.527" y="143.139">расходы, </tspan><tspan x="626.75" y="143.139">возникшие </tspan><tspan x="730.954" y="143.139">в </tspan><tspan x="747.512" y="143.139">связи </tspan><tspan x="804.272" y="143.139">с </tspan><tspan x="821.218" y="143.139">занятиями </tspan><tspan x="921.818" y="143.139">Застрахованным </tspan><tspan x="1077.74" y="143.139">альпинизмом, </tspan><tspan x="1210.22" y="143.139">скиальпинизмом, </tspan><tspan x="1373.65" y="143.139">прыжками </tspan><tspan x="1473.47" y="143.139">с </tspan><tspan x="1490.42" y="143.139">парашютом, </tspan><tspan x="1606" y="143.139">дельтапланеризмом, </tspan><tspan x="1798.99" y="143.139">парапланеризмом, </tspan><tspan x="1974.91" y="143.139">хелиски, </tspan><tspan x="2058.67" y="143.139">бэйсджампингом, </tspan><tspan x="0" y="164.139">скайсерфингом, </tspan><tspan x="150.504" y="164.139">кайтингом </tspan><tspan x="249.311" y="164.139">(кайтсерфингом, </tspan><tspan x="405.158" y="164.139">кайтбордингом), </tspan><tspan x="559.635" y="164.139">спидрайдингом, </tspan><tspan x="710.227" y="164.139">параглайдингом, </tspan><tspan x="866.918" y="164.139">скайдайвингом, </tspan><tspan x="1014.15" y="164.139">параскаем </tspan><tspan x="1115.16" y="164.139">и </tspan><tspan x="1131.13" y="164.139">другими </tspan><tspan x="1211.71" y="164.139">видами </tspan><tspan x="1283.15" y="164.139">воздушного </tspan><tspan x="1394.31" y="164.139">спорта. </tspan><tspan x="1460.95" y="164.139">
                    </tspan><tspan x="0" y="185.139">5. </tspan><tspan x="21.4182" y="185.139">Страховыми </tspan><tspan x="137.213" y="185.139">случаями </tspan><tspan x="227.538" y="185.139">по </tspan><tspan x="254.563" y="185.139">риску </tspan><tspan x="311.788" y="185.139">"страхование </tspan><tspan x="437.515" y="185.139">багажа" </tspan><tspan x="514.41" y="185.139">являются </tspan><tspan x="601.324" y="185.139">следующие </tspan><tspan x="709.684" y="185.139">события, </tspan><tspan x="794.875" y="185.139">имевшие </tspan><tspan x="881.262" y="185.139">место </tspan><tspan x="940.157" y="185.139">в </tspan><tspan x="955.563" y="185.139">течение </tspan><tspan x="1032.83" y="185.139">срока </tspan><tspan x="1090.21" y="185.139">страхования </tspan><tspan x="1207.17" y="185.139">и </tspan><tspan x="1223.61" y="185.139">подтвержденные </tspan><tspan x="1381.86" y="185.139">документально: </tspan><tspan x="1529.06" y="185.139">полная </tspan><tspan x="1596.83" y="185.139">гибель, </tspan><tspan x="1667.79" y="185.139">частичное </tspan><tspan x="1765.71" y="185.139">повреждение, </tspan><tspan x="1897.04" y="185.139">пропажа </tspan><tspan x="1980.25" y="185.139">целых </tspan><tspan x="2039.91" y="185.139">мест </tspan><tspan x="2088.35" y="185.139">багажа </tspan><tspan x="2157.37" y="185.139">(кроме </tspan><tspan x="0" y="206.139">ручной </tspan><tspan x="68.3438" y="206.139">клади), </tspan><tspan x="137.707" y="206.139">задержка </tspan><tspan x="228.639" y="206.139">багажа </tspan><tspan x="297.193" y="206.139">возникшие </tspan><tspan x="399.779" y="206.139">вследствие </tspan><tspan x="506.795" y="206.139">любых </tspan><tspan x="569.953" y="206.139">причин, </tspan><tspan x="644.977" y="206.139">если </tspan><tspan x="692.068" y="206.139">они </tspan><tspan x="729.615" y="206.139">имели </tspan><tspan x="790.646" y="206.139">место </tspan><tspan x="849.076" y="206.139">во </tspan><tspan x="874.74" y="206.139">время </tspan><tspan x="934.4" y="206.139">нахождения </tspan><tspan x="1047.04" y="206.139">багажа </tspan><tspan x="1115.6" y="206.139">у </tspan><tspan x="1130.62" y="206.139">авиаперевозчика.</tspan></text>
<text transform="translate(130 1605)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="24" font-weight="500" letter-spacing="0px"><tspan x="0" y="22.8516">Особые условия:</tspan></text>
            </g>
            <g id="summary">
                <g id="table-row">
                    <g id="cell">
                        @include('contract_documents.tourism.partials.coating_expansion', ['cords'=>[1866,1542],'info'=>$coating_expansion['danger_work']])
                    </g>
                    @if($coating_expansion['danger_work']['name'])
                        <g id="cell_2">
                            <path id="Rectangle 3_3" fill-rule="evenodd" clip-rule="evenodd" d="M0 0H364V2H0V0Z" transform="translate(1466 1567)" fill="#181920" fill-opacity="0.1"/>
                            <text id="Insuranse risks_12" transform="translate(1299 1542)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Type of activity</tspan></text>
    <text transform="translate(1299 1509)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Вид деятельности</tspan></text>
                        </g>
                    @endif
                    <g id="cell_3">
                        <text id="Insuranse risks_12" transform="translate(130 1542)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Events that occurred as a result of performing work of increased risk
                            </tspan></text>
<text id="Ð¡ÑÑÐ°ÑÐ¾Ð²ÑÐµ ÑÐ¸ÑÐºÐ¸_5" transform="translate(130 1509)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">События, произошедшие в результате выполнения работы повышенного риска</tspan></text>
                    </g>
                </g>
                <g id="table-row_2">
                    <g id="cell_4">
                        @include('contract_documents.tourism.partials.coating_expansion', ['cords'=>[1866,1450],'info'=>$coating_expansion['sport2']])
                    </g>
                    <g id="cell_5">
                        <text id="Insuranse risks_14" transform="translate(130 1450)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Events occurred during the insured person`s engagement in professional sports (participation/preparation for competitions)</tspan></text>
<text id="Ð¡ÑÑÐ°ÑÐ¾Ð²ÑÐµ ÑÐ¸ÑÐºÐ¸_7" transform="translate(130 1417)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">События, произошедшие в результате профессиональных занятий спортом (участием, подготовкой к соревнованиям)</tspan></text>
                    </g>
                </g>
                <g id="table-row_3">
                    <g id="cell_6">
                        @include('contract_documents.tourism.partials.coating_expansion', ['cords'=>[1866,1358],'info'=>$coating_expansion['sport1']])
                    </g>
                    <g id="cell_7">
                        <text id="Insuranse risks_16" transform="translate(130 1358)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Events occurred during the insured person`s engagement in amateur sports (active leisure)</tspan></text>
<text id="Ð¡ÑÑÐ°ÑÐ¾Ð²ÑÐµ ÑÐ¸ÑÐºÐ¸_9" transform="translate(130 1325)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">События, произошедшие в результате любительских занятий спортом (активного отдыха)</tspan></text>
                    </g>
                </g>
                <g id="table-row_4">
                    <g id="cell_8">
                        @include('contract_documents.tourism.partials.coating_expansion', ['cords'=>[1866,1266],'info'=>$coating_expansion['cancel']])
                    </g>
                    <g id="cell_9">
                        <text id="Insuranse risks_18" transform="translate(130 1266)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Risk compensation “trip cancellation” of cost due to refusal or delay in visa issuanse</tspan></text>
<text transform="translate(130 1233)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Возмещение по риску «отмена поездки» расходов по причине отказа или задержки в выдаче визы</tspan></text>
                    </g>
                </g>
            </g>
            <g id="table">
                <g id="table-sum">
                    <text transform="translate(180 1130)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Italic" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">* </tspan><tspan x="19.3715" y="22.8516">Страховая </tspan><tspan x="149.415" y="22.8516">сумма </tspan><tspan x="232.302" y="22.8516">по </tspan><tspan x="268.103" y="22.8516">рискам </tspan><tspan x="362.006" y="22.8516">«Медицинские </tspan><tspan x="547.877" y="22.8516">расходы», </tspan><tspan x="678.53" y="22.8516">«Страхование </tspan><tspan x="854.206" y="22.8516">багажа», </tspan><tspan x="968.593" y="22.8516">«Страхование </tspan><tspan x="1144.27" y="22.8516">от </tspan><tspan x="1176.79" y="22.8516">несчастного </tspan><tspan x="1330.15" y="22.8516">случая» </tspan><tspan x="1433.59" y="22.8516">указана </tspan><tspan x="1533.01" y="22.8516">на </tspan><tspan x="1567.92" y="22.8516">каждого </tspan><tspan x="1673.72" y="22.8516">застрахованного; </tspan><tspan x="1887.79" y="22.8516">страховая </tspan><tspan x="2013.69" y="22.8516">сумма </tspan><tspan x="2096.57" y="22.8516">по </tspan><tspan x="2132.38" y="22.8516">рискам </tspan><tspan x="0" y="57.8516">«Отмена </tspan><tspan x="112.219" y="57.8516">поездки» </tspan><tspan x="231.961" y="57.8516">, </tspan><tspan x="245.859" y="57.8516">«Досрочное </tspan><tspan x="399.188" y="57.8516">возвращение </tspan><tspan x="563.578" y="57.8516">из </tspan><tspan x="597.375" y="57.8516">поездки» </tspan><tspan x="717.117" y="57.8516">— </tspan><tspan x="747.891" y="57.8516">на </tspan><tspan x="782.297" y="57.8516">всех </tspan><tspan x="841.758" y="57.8516">застрахованных</tspan></text>
                    <g id="cell_10">
                        {{--<text transform="translate(1662 1044)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">{{$all_risks_rewards_sum}}</tspan></text>--}}
                    </g>
                    <g id="cell_11">
                        <text transform="translate(1289 1044)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516"></tspan></text>
                    </g>
                    <g id="cell_12">
                        <text id="Insuranse risks_19" transform="translate(179 1077)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Total</tspan></text>
<text transform="translate(179 1044)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Итого</tspan></text>
                    </g>
                    <path id="Rectangle 2" fill-rule="evenodd" clip-rule="evenodd" d="M0 0H2220V2H0V0Z" transform="translate(179 1022)" fill="#181920"/>
                </g>
                <g id="table-row 5">
                    <g id="cell_13">
                        @include('contract_documents.tourism.partials.risk_date', ['cords'=>[2049,924], 'risk'=>$dict::MODULE__ACCIDENT])
                    </g>
                    <g id="cell_14">
                        @include('contract_documents.tourism.partials.reward_sum', ['cords'=>[1662,924], 'risk'=>$dict::MODULE__ACCIDENT])
                    </g>
                    <g id="cell_15">
                        @include('contract_documents.tourism.partials.insurance_sum', ['cords'=>[1289,924], 'risk'=>$dict::MODULE__ACCIDENT])
                    </g>
                    <g id="cell_16">
                        <text id="Insuranse risks_20" transform="translate(179 957)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Accident insurance</tspan></text>
<text transform="translate(179 924)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Страхование от несчастного случая</tspan></text>
                    </g>
                </g>
                <g id="table-row_5">
                    <g id="cell_17">
                        @include('contract_documents.tourism.partials.risk_date', ['cords'=>[2049,840], 'risk'=>$dict::MODULE__MED])
                    </g>
                    <g id="cell_18">
                        @include('contract_documents.tourism.partials.reward_sum', ['cords'=>[1662,840], 'risk'=>$dict::MODULE__MED,'use_converted'=>false])
                    </g>
                    <g id="cell_19">
                        @include('contract_documents.tourism.partials.insurance_sum', ['cords'=>[1289,840], 'risk'=>$dict::MODULE__MED,'use_converted'=>false])
                    </g>
                    <g id="cell_20">
                        <text transform="translate(747 840)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Italic" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">{{$unconditional_franchise}}</tspan></text>
<text id="Insuranse risks_23" transform="translate(179 873)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Medical expenses</tspan></text>
<text transform="translate(179 840)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Медицинские расходы</tspan></text>
                    </g>
                </g>
                <g id="table-head">
                    <path id="Rectangle 2_2" fill-rule="evenodd" clip-rule="evenodd" d="M0 0H2220V2H0V0Z" transform="translate(179 808)" fill="#181920" fill-opacity="0.1"/>
                    <g id="cell_21">
                        <text id="Insuranse risks_24" transform="translate(2049 763)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Period of insurance</tspan></text>
<text transform="translate(2049 730)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Период страхования</tspan></text>
                    </g>
                    <g id="cell_22">
                        <text id="Insuranse risks_25" transform="translate(1662 763)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Insuranse premium</tspan></text>
<text transform="translate(1662 730)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Страховая премия</tspan></text>
                    </g>
                    <g id="cell_23">
                        <text id="Insuranse risks_26" transform="translate(1289 763)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Sum insured</tspan></text>
<text transform="translate(1289 730)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Страховая сумма *</tspan></text>
                    </g>
                    <g id="cell_24">
                        <text id="Insuranse risks_27" transform="translate(179 763)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Insuranse risks</tspan></text>
<text transform="translate(179 730)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="24" letter-spacing="0px"><tspan x="0" y="22.8516">Страховые риски</tspan></text>
                    </g>
                </g>
            </g>
            <g id="main">
                <path id="Rectangle_2" fill-rule="evenodd" clip-rule="evenodd" d="M0 2C0 0.895431 0.895431 0 2 0H2398C2399.1 0 2400 0.895431 2400 2V383C2400 384.105 2399.1 385 2398 385H2C0.895431 385 0 384.105 0 383V2Z" transform="translate(40 325)" fill="#F73A3B" fill-opacity="0.05"/>
                <g>
                    <text transform="translate(1132 575)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="24" font-weight="500" letter-spacing="0px"><tspan x="0" y="22.8516">{{$countries}}</tspan></text>
<text transform="translate(1132 506)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="20" font-weight="500" letter-spacing="2.5px"><tspan x="0" y="19.043">ТЕРРИТОРИЯ СТРАХОВАНИЯ /
    </tspan><tspan x="0" y="49.043">TERRITORY OF INSURANCE</tspan></text>
                </g>
                <g>
<text transform="translate(1603 503)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="20" font-weight="500" letter-spacing="2.5px"><tspan x="0" y="19.043">КОЛ-ВО ДНЕЙ ПО ЗАКЛЮЧЕННОМУ ДОГОВОРУ, КОГДА </tspan><tspan x="0" y="49.043">ДЕЙСТВУЕТ СТРАХОВАНИЕ /
    </tspan><tspan x="0" y="79.043">NUMBER OF DAYS INSURED WITHIN THE CONTRACT TERM</tspan></text>
                </g>
                <path id="divider_2" fill-rule="evenodd" clip-rule="evenodd" d="M0 0H137V2H0V0Z" transform="translate(1085 503) rotate(90)" fill="#181920" fill-opacity="0.1"/>
                <g>
                    <text transform="translate(130 541)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="26" font-weight="500" letter-spacing="0px">
                        @include('contract_documents.tourism.partials.polis_insured_part')
                    </text>
                    <text transform="translate(130 506)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="20" font-weight="500" letter-spacing="2.5px">
                        <tspan x="0" y="19.043">ЗАСТРАХОВАННЫЕ ЛИЦА / INSURED PERSONS</tspan>
                    </text>
                </g>
                <g>
                    <text transform="translate(797 398)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="24" font-weight="500" letter-spacing="0px"><tspan x="0" y="22.8516">{{$insurant['inn']}}</tspan></text>
<text transform="translate(797 360)" fill="#181920" fill-opacity="0.5" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="20" font-weight="500" letter-spacing="2.5px"><tspan x="0" y="19.043">ИНН / TIN</tspan></text>
                </g>
                <g id="Group_2">
                    <text transform="translate(1242 398)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="24" font-weight="500" letter-spacing="0px"><tspan x="0" y="22.8516">{{$insurant['kpp']}}</tspan></text>
<text transform="translate(1242 360)" fill="#181920" fill-opacity="0.5" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="20" font-weight="500" letter-spacing="2.5px"><tspan x="0" y="19.043">КПП / RRC</tspan></text>
                </g>
                <g>
                    <text transform="translate(1601 398)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="24" font-weight="500" letter-spacing="0px">
                        {{--<tspan x="0" y="22.8516">{{$insurant['address']}}</tspan>--}}
                        {{--<tspan x="0" y="54.8516">{{$insurant['phone']}}</tspan>--}}
                    </text>
<text transform="translate(1601 360)" fill="#181920" fill-opacity="0.5" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="20" font-weight="500" letter-spacing="2.5px"><tspan x="0" y="19.043">АДРЕС, ТЕЛЕФОН / ADDRESS, PHONE NUMBER</tspan></text>
                </g>
                <g>
                    <text transform="translate(130 395)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="26" font-weight="500" letter-spacing="0px"><tspan x="0" y="24.7559">{{$insurant['name']}}</tspan></text>
<text transform="translate(130 360)" fill="#181920" fill-opacity="0.5" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="20" font-weight="500" letter-spacing="2.5px"><tspan x="0" y="19.043">СТРАХОВАТЕЛЬ / POLICY HOLDER</tspan></text>
                </g>
            </g>
            <g id="name">
                <text transform="translate(130 269)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="18" letter-spacing="0px"><tspan x="0" y="17.1387">Настоящий </tspan><tspan x="108.737" y="17.1387">полис </tspan><tspan x="170.962" y="17.1387">подтверждает </tspan><tspan x="306.629" y="17.1387">факт </tspan><tspan x="357.762" y="17.1387">заключения </tspan><tspan x="472.722" y="17.1387">договора </tspan><tspan x="564.601" y="17.1387">страхования </tspan><tspan x="685.291" y="17.1387">на </tspan><tspan x="715.437" y="17.1387">основании </tspan><tspan x="819.867" y="17.1387">«Комбинированных </tspan><tspan x="1006.37" y="17.1387">правил </tspan><tspan x="1078.74" y="17.1387">страхования </tspan><tspan x="1199.43" y="17.1387">граждан, </tspan><tspan x="1289.9" y="17.1387">выезжающих </tspan><tspan x="1415.95" y="17.1387">за </tspan><tspan x="1444.83" y="17.1387">пределы </tspan><tspan x="1530.75" y="17.1387">постоянного </tspan><tspan x="1651.57" y="17.1387">места </tspan><tspan x="1713.7" y="17.1387">жительства» </tspan><tspan x="1838" y="17.1387">от </tspan><tspan x="1866.54" y="17.1387">20.11.2018г., </tspan><tspan x="1981.87" y="17.1387">"Правил </tspan><tspan x="2064.8" y="17.1387">индивидуального </tspan><tspan x="0" y="38.1387">страхования </tspan><tspan x="116.49" y="38.1387">от </tspan><tspan x="140.836" y="38.1387">несчастных </tspan><tspan x="249.539" y="38.1387">случаев" </tspan><tspan x="333.58" y="38.1387">от </tspan><tspan x="357.926" y="38.1387">27.12.2017г. </tspan><tspan x="463.711" y="38.1387">(далее </tspan><tspan x="528.135" y="38.1387">- </tspan><tspan x="541.705" y="38.1387">Правила </tspan><tspan x="622.67" y="38.1387">страхования), </tspan><tspan x="751.377" y="38.1387">являющихся </tspan><tspan x="865.107" y="38.1387">неотъемлемой </tspan><tspan x="1001.69" y="38.1387">частью </tspan><tspan x="1069.61" y="38.1387">настоящего </tspan><tspan x="1178.95" y="38.1387">полиса.     </tspan></text>
                <path id="Rectangle_3" fill-rule="evenodd" clip-rule="evenodd" d="M0 2C0 0.895431 0.895431 0 2 0H668C669.105 0 670 0.895431 670 2V70C670 71.1046 669.105 72 668 72H2C0.895431 72 0 71.1046 0 70V2Z" transform="translate(1770 164)" fill="#F73A3B" fill-opacity="0.05"/>
                <text id="Travel Insurance Pol" transform="translate(130 218)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="35" font-weight="500" letter-spacing="0px"><tspan x="0" y="33.3252">Travel Insurance Policy</tspan></text>
<text transform="translate(130 164)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="36" font-weight="500" letter-spacing="0px"><tspan x="0" y="34.2773">Полис страхования граждан, выезжающих за пределы постоянного места жительства  </tspan></text>
<text transform="translate(1770 178)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="36" font-weight="500" letter-spacing="0px"><tspan x="72.625" y="34.2773">№{{$contract_id_friendly}}/ФВП/{{$create_year}} от {{$create_date}}</tspan></text>
            </g>
            <g id="head">
                <g id="head-text">
                    <text transform="translate(2146 75)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="28" letter-spacing="0px"><tspan x="0" y="26.6602"></tspan></text>
<text transform="translate(2146 40)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="22" font-weight="500" letter-spacing="2.7px"><tspan x="0" y="20.9473">САЙТ</tspan></text>
                </g>
                <g id="head-text_2">
                    <text transform="translate(1767 75)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="28" letter-spacing="0px"><tspan x="0" y="26.6602"></tspan></text>
<text transform="translate(1767 40)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="22" font-weight="500" letter-spacing="2.7px"><tspan x="0" y="20.9473">ТЕЛЕФОН</tspan></text>
                </g>
                <g id="head-text_3">
                    <text transform="translate(612 75)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="28" letter-spacing="0px"><tspan x="0" y="26.6602">ООО «Страховая компания </tspan></text>
<text transform="translate(612 40)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="22" font-weight="500" letter-spacing="2.7px"><tspan x="0" y="20.9473">СТРАХОВЩИК</tspan></text>
                </g>
                <g id="head-text_4">
                    <text transform="translate(1214 75)" fill="#181920" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Regular" font-size="28" letter-spacing="0px"><tspan x="0" y="26.6602">г. Казань, пр. Ф. Амирхана, д. 21</tspan></text>
<text transform="translate(1214 40)" fill="#181920" fill-opacity="0.7" xml:space="preserve" style="white-space: pre" font-family="SF Pro Text" font-style="Medium" font-size="22" font-weight="500" letter-spacing="2.7px"><tspan x="0" y="20.9473">АДРЕС</tspan></text>
                </g>
                <g id="logo">
                    <rect id="Bitmap" width="320" height="84" transform="translate(130 40)" fill="url(#pattern2)"/>
                </g>
            </g>
        </g>
        <defs>
            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image0" transform="translate(-0.00174293) scale(0.00097237)"/>
            </pattern>
            <pattern id="pattern1" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image1" transform="translate(-0.00225125) scale(0.00162017 0.0015083)"/>
            </pattern>
            <pattern id="pattern2" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image2" transform="scale(0.00364964 0.0138889)"/>
            </pattern>
            <clipPath id="clip0">
                <rect width="2480" height="3508" fill="white"/>
            </clipPath>
        </defs>
    </svg>
@endsection