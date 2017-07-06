<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice</title>
    <style>
        .main-page {
            font-size: 14px;
        }
        .list-title {
            text-align: center;
            font-size: 18px;
            font-weight: 600;
            line-height: 2.5;
        }
        .header {
            padding: 40px 20px;
        }
        table {
            width: 100%;
        }
        table td, th {
            text-align: center;
        }
        .number-document {
            padding-left: 90%;
        }
        .list-header {
            padding-top: 20px;
        }
        table {
            border-collapse: collapse;
            border: 1px solid black;
        }
        th, td {
            border: 1px solid black;
        }
        .user-data {
            padding-top: 160px;
        }

    </style>
</head>
<body>
<div class="main-page">
    <div class="number-document">Ф. 103</div>
    <div class="list-title">Список № {{$data["id"]}}</div>
    <div class="list-title">Внутренних почтовых отправлений от {{$data['date_delivery']}}</div>
    <div class="header">
        <div class="list-header">
            Вид и категория РПО:
             МКПО обыкновенное
        </div>
        <div class="list-header">
            Отправитель:
            <b>ООО «Компания Интерлогистика»</b>
        </div>
        <div class="list-header">
            Наименование и индекс места приема:
            102152 ОПС ПЖДП при Павелецком вокзале
        </div>
        <div class="list-header">
            Всего РПО
            {{count($places)}} штук
        </div>
    </div>
    <table >
        <thead>
        <tr>
            <td class="number-td">
                № <br> п/п
            </td>
            <td class="number-address">
                Адресат (Наименование организации, тлф)
            </td>
            <td class="number-weight">
                Вес (кг)
            </td>
            <td class="number-scope">
                Объем(м3)
            </td>
            <td class="number-rate">
                Тариф, руб
            </td>
            <td class="number-rate">
                Кол-во <br> отпр
            </td>
        </tr>
        </thead>
        <tbody>
        @foreach($places as $keyPlace => $valPlace)
            <tr>
                <td>
                    {{++$keyPlace}}
                </td>
                <td>
                    {{$city_receipt}}, {{$data["recipient_address"]}}, {{$data["recipient_name"]}}, тел. {{$data["recipient_phone"]}}
                </td>
                <td>
                    {{$valPlace["weight"]}}
                </td>
                <td>
                    {{$valPlace["scope"]}}
                </td>
                <td>
                    {{$valPlace["rate"]}}
                </td>
                <td>
                    1
                </td>
            </tr>
        @endforeach
        <tr>
            <td>

            </td>
            <td>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Итого
            </td>
            <td>
                {{$totalPlacesData["weight"]}}
            </td>
            <td>
                {{$totalPlacesData["scope"]}}
            </td>
            <td>

            </td>
            <td>

            </td>
        </tr>
        </tbody>
    </table>
    <div class="user-data">
        ОТПРАВИТЕЛЬ: _______________________________
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        ПРИНЯЛ: _______________________________
    </div>
    <div>
        &nbsp;&nbsp; (печать, подпись, ФИО)
    </div>
</div>
</body>
</html>