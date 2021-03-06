<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Отчёт</title>
</head>
<body>
<table>

    <tr>
        <td>Акт Приема-Передачи груза № __________</td>
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
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td> г.Москва</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            "<span class="text-underlined">{{date('d')}}</span>"
            <span class="text-underlined">{{date('m')}} </span> {{date('Y')}}г.
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
    </tr>
    <tr>
        <td></td>
        <td>
            Общество с ограниченной ответственностью «__________», именуемое в дальнейшем «Клиент», в лице Генерального директора _________________,
            действующего на основании Устава, с одной Стороны, и Общество с ограниченной ответственностью «Компания Интерлогистика», именуемое в
            дальнейшем «Исполнитель», в лице Генерального директора Гривиннова Сергея Викторовича, действующего на основании Устава, с другой Стороны,
            в соответствие с Договором № ______ от «__» _______ 2017 г. составила настоящий Акт о нижеследующем:
        </td>
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
    </tr>
    <tr>
        <td></td>
        <td>
            Клиент передал, а Исполнитель принял груз:
        </td>
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
    </tr>
    <tr>
        <td></td>
        <td>№</td>
        <td>Порядковый номер отправления</td>
        <td>Город отправления</td>
        <td>Город прибытия</td>
        <td>
            Получатель <br>
            (юр.лицо, ИНН / ФИО, № паспорта)
        </td>
        <td>Вид упаковки</td>
        <td>Кол-во мес</td>
        <td>Оценочная стоимость, руб</td>
        <td>
            Вес, кг
            (общий)
        </td>
        <td>Объем,куб. м (общий)</td>
    </tr>
    @foreach($dataBids as $keyBidItem => $valBidItem)
        <tr>
            <td></td>
            <td>
                {{++$keyBidItem}}
            </td>
            <td>
                {{$valBidItem->id}}
            </td>
            <td>
                {{$valBidItem->departure_city}}
            </td>
            <td>
                {{$valBidItem->city_receipt}}
            </td>
            <td>
                {{$valBidItem->recipient_name}}
            </td>
            <td>

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
        </tr>
    @endforeach
    <tr>
        <td></td>
        <td colspan="6" style="text-align: right"> И Т О Г О:</td>
        <td>
            {{$totalData["totalCountPlace"]}}
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
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="2"> Клиент </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Исполнитель</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="2">__________________________</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="3">ООО «Компания Интерлогистика»</td>
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
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="3" class="text-underlined"> ____________________/________________</td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="3" class="text-underlined">____________________/________________</td>
        <td></td>

    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>М.П.</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>М.П.</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

</body>
</html>
