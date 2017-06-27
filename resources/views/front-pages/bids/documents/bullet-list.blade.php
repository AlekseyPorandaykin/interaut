<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice</title>
    <style>
        .main-page {
            padding: 10px 80px;
        }
        .circumscribing {
            text-align: center;
            font-size: 30px;
            font-weight: 600;
        }
        .appellation {
            font-size: 50px;
            text-align: center;
            font-weight: 700;
        }
        div {
            padding: 10px 0px;
        }
        .appellation.departure_city {
            border-bottom: 2px solid black;
        }
        .bottom-text.circumscribing {
            padding-left: 350px;
            padding-right: 350px;
        }
        .bottom-text-left {
            display: inline-block;
            float: left;
        }
        .bottom-text-right {
            display: inline-block;
            float: right;
        }
    </style>
</head>
<body>
@foreach($places as $keyPlace =>  $valPlace)
<div class="main-page">
    <div class="circumscribing">Отправитель:</div>
    <div class="appellation">ООО «Компания Интерлогистика»</div>
    <div class="appellation departure_city">{{$data["departure_city"]}} </div>
    <hr>
    <div class="circumscribing"> Получатель:</div>
    <div class="appellation">{{$data["city_receipt"]}} </div>
    <div class="appellation name-recipient">{{$data["recipient"]}}</div>
    <div class="circumscribing address-recipient">Адрес: {{$data["address"]}} {{$data["phone"]}}</div>
    <div class="bottom-text circumscribing">
        <div class="bottom-text-left">
            Место {{++$keyPlace}}  из {{count($places)}}
        </div>
        <div class="bottom-text-right">
            Дата отправление: {{$data['date_delivery']}}.
        </div>
    </div>
</div>
@endforeach
</body>
</html>