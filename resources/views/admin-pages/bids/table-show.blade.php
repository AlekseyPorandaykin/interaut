{{ Form::open([ 'method' => 'get',]) }}
        <b>Отобразить заявки за период</b>
        <br><br>
        <div class="col-sm-6">
            <div class="col-sm-4">
                <label class="col-sm-3 control-label">с</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control datetimepicker-main" name="date_start" placeholder="дд.мм.гг">
                </div>
            </div>
            <div class="col-sm-4">
                <label  class="col-sm-3 control-label">по</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control datetimepicker-main" name="date_end" placeholder="дд.мм.гг">
                </div>
            </div>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-default" name="action_button" value="date">Выбрать</button>
            </div>
        </div>
        <div class="col-sm-6">
            <a href="?period=week">за неделю</a> &nbsp;
            <a href="?period=month">за месяц</a>&nbsp;
            <a href="?period=year">за год</a>&nbsp;
        </div>
        <br><br><br>
        <div class="col-sm-6">
            <div class="col-sm-4">
                <label class="col-sm-3 control-label">из</label>
                <div class="col-sm-9">
                    <select class="form-control" name="departure_city">
                        @foreach ($departureCity as $departureCityItem)
                            <option value="{{$departureCityItem->id}}">{{$departureCityItem->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <label  class="col-sm-3 control-label">В</label>
                <div class="col-sm-9">
                    <select class="form-control" name="city_receipt">
                        @foreach ($receiptCity as $receiptCityItem)
                            <option value="{{$receiptCityItem->id}}">{{$receiptCityItem->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-default"  name="action_button" value="city">Выбрать</button>
            </div>

        </div>
{{ Form::close() }}

<br><br><br>
@if (count($data)>0)
   <b> Исполненные заявки за период с {{$data[0]->created_at}} по {{$data[count($data)-1]->created_at}}</b>
    <span style="padding-left: 25%;"> <a><span class="glyphicon glyphicon-download-alt"></span> XLS</a> &nbsp; <a data-remodal-target="report" >Создать отчёт</a> </span>
@endif

<br><br>
<table class="table table-hover">
    <thead>
    <tr>
        <th>Заявка №</th>
        <th>Дата</th>
        <th>Номер груза клиета</th>
        <th>Город отправления</th>
        <th>Город получения</th>
        <th>Кол-во мест</th>
        <th>Вес, кг.</th>
        <th>Объем, куб. м.</th>
        <th>Оц. ст-сть, руб</th>
        <th>Получатель</th>
        <th>Дата получения</th>
        <th>Сумма, руб</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
        <tr>
            <td>@if ($item->bid_status_id != 3)<a href="/admin/bids/edit/{{$item->id}}" >{{$item->id}}</a> @else {{$item->id}} @endif</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->consignment_number}}</td>
            <td>{{$item->departure_city}}</td>
            <td>{{$item->city_receipt}}</td>
            <td>{{$item->places['count_place']}}</td>
            <td>{{$item->places['weight']}}</td>
            <td>{{$item->places['scope']}}</td>
            <td>{{$item->places['assessed_value']}}</td>
            <td>{{$item->recipient_name}}</td>
            <td>{{$item->date_delivery}}</td>
            <td>2</td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="remodal" data-remodal-id="report"
     data-remodal-options="hashTracking: false, closeOnOutsideClick: false">

    <button data-remodal-action="close" class="remodal-close"></button>
    <h1>Сформировать отчёт</h1>
    {{ Form::open([ 'method' => 'post', 'route' => 'create-report']) }}
        <table class="table table-hover">
            <thead>
            <tr>
                <th></th>
                <th>Заявка №</th>
                <th>Дата</th>
                <th>Номер груза клиета</th>
                <th>Город отправления</th>
                <th>Город получения</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td><input type="checkbox" name="reportData[]" value="{{$item->id}}" checked></td>
                    <td>@if ($item->bid_status_id != 3)<a href="/admin/bids/edit/{{$item->id}}" >{{$item->id}}</a> @else {{$item->id}} @endif</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->consignment_number}}</td>
                    <td>{{$item->departure_city}}</td>
                    <td>{{$item->city_receipt}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    <button type="submit" class="btn btn-default" name="action_report" value="report">Скачать отчёт</button>
    <button type="submit" class="btn btn-default" name="action_report" value="app">Скачать АПП(XLS)</button>
    {{ Form::close() }}
</div>
@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('.datetimepicker-main').datetimepicker({
                format: 'DD.MM.YY',
                locale: 'ru'
            });
        });
    </script>

@stop