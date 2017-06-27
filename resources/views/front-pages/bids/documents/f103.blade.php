<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice</title>
    <style>
        .main-page {
            font-size: 18px;
        }
        .list-title {
            text-align: center;
            font-size: 35px;
            font-weight: 600;
        }
        .header {
            padding: 40px 20px;
        }
        .list-header {
            display: inline-block;
        }
        table {
            width: 100%;
        }
        table td, th {
            text-align: center;
        }

    </style>
</head>
<body>
<div class="main-page">
    <div class="list-title">Список № {{$data["id"]}}</div>
    <div class="list-title">внутренних почтовых отправлений от {{$data["date_delivery"]}}</div>
    <div class="header">
        <span class="list-header list-header-nane">Наименование и индекс места приема :</span>
        <span class="list-header list-header-text"> 102152 ОПС ПЖДП при Павелецком вокзале </span>
        <br>
        <span class="list-header list-header-nane">Всего РПО    </span>
        <span class="list-header list-header-text">{{count($places)}} штук</span>
    </div>
    <table border="1">
        <thead>
        <tr>
            <th class="number-td">
                № <br> п/п
            </th>
            <th class="number-address">
                Адресат (Наименование организации, тлф)
            </th>
            <th class="number-weight">
                Вес (кг)
            </th>
            <th class="number-scope">
                Объем(м3)
            </th>
            <th class="number-rate">
                Тариф, руб
            </th>
            <th class="number-rate">
                Кол-во <br> отпр
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($places as $keyPlace => $valPlace)
            <tr>
                <td>
                    {{++$keyPlace}}
                </td>
                <td>
                    {{$data["city_receipt"]}}, {{$data["address"]}}, {{$data["recipient"]}}, тел. {{$data["phone"]}}
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
        </tbody>
    </table>
</div>
</body>
</html>