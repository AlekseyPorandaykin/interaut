<h1>Заявка пользователя</h1>
@include('front-pages.common.errors')
{{ Form::open(['route' => 'add-bid', 'method' => 'post', 'class' => 'form-horizontal']) }}
    <div class="form-group">
        <label class="col-sm-2 control-label">Клиентский номер груза</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="consignment_number">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Город отправления </label>
        <div class="col-sm-10">
            <select class="form-control" name="departure_city">
                @foreach ($departureCity as $departureCityItem)
                    <option value="{{$departureCityItem->id}}">{{$departureCityItem->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Город получения </label>
        <div class="col-sm-10">
            <select class="form-control" name="city_receipt" >
                @foreach ($receiptCity as $receiptCityItem)
                    <option value="{{$receiptCityItem->id}}">{{$receiptCityItem->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Дата сдачи груза</label>
        <div class="col-sm-10">
            <input type="text" class="form-control datetimepicker-main" required name="date_delivery" >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Получатель</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Название юр.лица / ФИО " name="recipient_name" required value="{{$recipient_name}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Адрес</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Индекс, город, ул. , д., оф" name="recipient_address" require value="{{$recipient_address}}"d>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Телефон получателя</label>
        <div class="col-sm-10">
            <input type="phone" class="form-control" name="recipient_phone" required value="{{$recipient_phone}}">
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Забронировать места</h3>
        </div>
        <div class="panel-body">
            <div class=" col-sm-11 table-place-bid"></div>
            <label class="col-sm-2 control-label">Добавить место</label>
            <div class=" col-sm-10">
                <a type="button" class="btn btn-primary" onclick="addPlaceBid(this)" data-number="1"><span class="glyphicon glyphicon-plus"></span></a>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Создать</button>
        </div>
    </div>
{{ Form::close() }}
@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('.datetimepicker-main').datetimepicker({
                format: 'DD.MM.YYYY',
            });
        });
    </script>
@stop