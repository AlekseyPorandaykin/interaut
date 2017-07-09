@extends('admin-pages.index')
@section('title', 'Новая заявка')

@section('content')
    {{ Form::open(['route' => 'create-bid', 'method' => 'post', 'class' => 'form-horizontal col-xs-12 col-md-8']) }}
    <input type="hidden" name="_method" value="PUT">
        <p class="text-center">Заявка на отправление груза</p>
        <div class="form-group">
            <div class="col-sm-6">
                <label class="col-sm-5 control-label">Клиентский номер груза</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="consignment_number">
                </div>
            </div>
            <div class="col-sm-6">
                <label  class="col-sm-5 control-label">Дата сдачи груза</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control datetimepicker-main" name="date_delivery">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <label class="col-sm-5 control-label">Город отправления</label>
                <div class="col-sm-7">
                    <select class="form-control" name="departure_city">
                        @foreach ($departureCity as $departureCityItem)
                            <option value="{{$departureCityItem->id}}">{{$departureCityItem->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <label  class="col-sm-5 control-label">Город получения</label>
                <div class="col-sm-7">
                    <select class="form-control" name="city_receipt">
                        @foreach ($receiptCity as $receiptCityItem)
                            <option value="{{$receiptCityItem->id}}">{{$receiptCityItem->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-9"></div>
            <div class="col-sm-3">
                <a data-remodal-target="modal">расписание отправлений</a>
            </div>
        </div>
        <p class="text-center">Реквизиты отправителя</p>
        <div class="form-group">
            <div class="col-sm-7">
                <label class="col-sm-3 control-label">Название</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Название юр. лица / ФИО" name="sender_name">
                </div>
            </div>
            <div class="col-sm-5">
                <label  class="col-sm-4 control-label">Телефон</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="sender_phone">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Адрес</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="Индекс, город, ул., д., оф." name="sender_address">
            </div>
        </div>

        <p class="text-center">Реквизиты получателя</p>
        <div class="form-group">
            <div class="col-sm-7">
                <label class="col-sm-3 control-label">Название</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Название юр. лица / ФИО" name="recipient_name">
                </div>
            </div>
            <div class="col-sm-5">
                <label  class="col-sm-4 control-label">Телефон</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="recipient_phone">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Адрес</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="Индекс, город, ул., д., оф." name="recipient_address">
            </div>
        </div>
        <p class="text-center">Параметры отправления</p>
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
    <div class="remodal" data-remodal-id="modal"
         data-remodal-options="hashTracking: false, closeOnOutsideClick: false">

        <button data-remodal-action="close" class="remodal-close"></button>
        <h1>Расписание отправлений</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>№</th>
                <th>Дата</th>
                <th>Дата сдачи</th>
                <th>Дата получения</th>
                <th>ГОРОД ОТПРАВЛЕНИЯ</th>
                <th>ГОРОД ПОЛУЧЕНИЯ</th>
            </tr>
            </thead>
            <tbody>
            @foreach($departureSchedule as $departureScheduleItem)
                <tr>
                    <th scope="row">{{$departureScheduleItem->number_departure}}</th>
                    <td>{{$departureScheduleItem->date}}</td>
                    <td>{{$departureScheduleItem->data_delivery}}</td>
                    <td>{{$departureScheduleItem->receipt_data}}</td>
                    <td>{{$departureScheduleItem->departure_city}}</td>
                    <td>{{$departureScheduleItem->city_receipt}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>


        <br>
        {{--<button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>--}}
        <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('.datetimepicker-main').datetimepicker({
                format: 'DD.MM.YYYY',
            });
        });
    </script>

@stop