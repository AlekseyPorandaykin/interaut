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
            <input type="text" class="form-control" required name="departure_city">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Город получения </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" required name="city_receipt">
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
            <input type="text" class="form-control" placeholder="Название юр.лица / ФИО " name="recipient" required value="{{$recipient}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Адрес</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Индекс, город, ул. , д., оф" name="address" require value="{{$address}}"d>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Телефон получателя</label>
        <div class="col-sm-10">
            <input type="phone" class="form-control" name="phone" required value="{{$phone}}">
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
            <button type="submit" class="btn btn-default">Отправить</button>
        </div>
    </div>
{{ Form::close() }}
@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('.datetimepicker-main').datetimepicker({
            });
        });
    </script>
@stop