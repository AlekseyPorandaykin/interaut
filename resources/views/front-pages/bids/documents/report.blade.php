<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Отчёт</title>
</head>
<body>
<table class="main-page">
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="title-text"> Отчёт №__________</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="5" class="title-text"> о выполненных услугах по перевозке грузов</td>

        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="2">г.Москва</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="3">
            "<span class="text-underlined">{{date('d')}}</span>"
            <span class="text-underlined">{{date('m')}} </span> {{date('Y')}}г.
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="12">
            Общество с ограниченной ответственностью «__________», именуемое в дальнейшем «Клиент», в лице Генерального директора
            __________, действующего на основании Устава, с одной Стороны, и Общество с ограниченной ответственностью «Компания
            Интерлогистика»,  именуемое в дальнейшем «Исполнитель», в лице Генерального директора Гривиннова Сергея Викторовича,
            действующего на основании Устава, с другой Стороны, в соответствие с Договором № ______ от «__» _______ 2017 г. за период с <span class="text-underlined">{{$dataBids[0]['created_bid']}}</span> по <span class="text-underlined">{{$dataBids[count($dataBids)-1]['created_bid']}}</span> , Исполнителем были выполненны следующие Услуги по перевозке грузов
            <span class="text-underlined">{{$dataBids[0]['created_bid']}}</span> по <span class="text-underlined">{{$dataBids[count($dataBids)-1]['created_bid']}}</span> , Исполнителем были выполненны следующие Услуги по перевозке грузов по заявкам Клиента:
            по заявкам Клиента:
        </td>
    </tr>
    <tr>
        <td colspan="12">

        </td>
    </tr>
    <tr>
        <td colspan="12">

        </td>
    </tr>
    <tr>
        <td colspan="12">

        </td>
    </tr>
    <tr>
        <td colspan="12">

        </td>
    </tr>
    <tr>
        <td colspan="12">

        </td>
    </tr>
    <tr>
        <td colspan="12">
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr class="report-data">
        <td>№ п/п</td>
        <td>Номер груза</td>
        <td colspan="2">Город отправления</td>
        <td>Город получения</td>
        <td>Получатель (юр.лицо, ИНН / ФИО, № паспорта)</td>
        <td>Кол-во мест</td>
        <td>Оценочная стоимость, руб</td>
        <td>Вес, кг (общий)</td>
        <td>Объем, куб.м (общий)</td>
        <td>Итоговая стоимость услуг, руб.</td>
        <td>в т.ч. НДС, руб</td>
    </tr>
    @foreach($dataBids as $keyBidItem => $valBidItem)
        <tr class="report-data">
            <td>
                {{++$keyBidItem}}
            </td>
            <td>
                {{$valBidItem->id}}
            </td>
            <td colspan="2">
                {{$valBidItem->departure_city}}
            </td>
            <td>
                {{$valBidItem->city_receipt}}
            </td>
            <td>
                {{$valBidItem->recipient_name}}
            </td>
            <td>
                {{$valBidItem->places["count_place"]}}
            </td>
            <td>
                {{$valBidItem->places["assessed_value"]}}
            </td>
            <td>
                {{$valBidItem->places["weight"]}}
            </td>
            <td>
                {{$valBidItem->places["scope"]}}
            </td>
            <td>

            </td>
            <td>

            </td>
        </tr>
    @endforeach
    <tr class="report-data">
        <td></td>
        <td colspan="6">
            <b>ИТОГО:</b>
        </td>
        <td>
            {{$totalData["totalAssessedValue"]}}
        </td>
        <td>
            {{$totalData["totalWeight"]}}
        </td>
        <td>
            {{$totalData["totalScope"]}}
        </td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr  class="bottom-text">
        <td></td>
        <td colspan="10" style="text-align: left">
            Общая сумма вознаграждения по данному Отчёту ____ (_____________) руб 00 коп, в том числе НДС 18% - ___________ рублей.
        </td>
        <td></td>
    </tr>
    <tr  class="bottom-text">
        <td></td>
        <td colspan="10" style="text-align: left">
            Подписывая настоящий Отчёт, стороны подтверждают, что Услуги по доставке грузов оказаны  в полном объёме и
        </td>
        <td></td>
    </tr>
    <tr  class="bottom-text">
        <td></td>
        <td colspan="10" style="text-align: left">
             Стороны не имеют претензий по выполненным Услугам.
        </td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td></td>
        <td colspan="4"> Клиент </td>
        <td></td>
        <td colspan="5"> Исполнитель </td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4"> ООО "_____________________" </td>
        <td></td>
        <td colspan="5"> ООО "Компания Интерлогистика" </td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4"> _______________/________________ </td>
        <td></td>
        <td colspan="5"> _______________/________________ </td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4"> М.П. </td>
        <td></td>
        <td colspan="5"> М.П. </td>
        <td></td>
    </tr>

</table>

</body>
</html>