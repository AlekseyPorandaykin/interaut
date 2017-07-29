@extends('admin-pages.index')
@section('title', 'Изменить заявку')

@section('content')
    <div class="col-xs-6 col-md-6">
        <div class="col-xs-1 col-md-1"></div>
        <div class="col-xs-11 col-md-11">
            <p>
                <strong> Заказ №:</strong>
                {{$data->id}}
            </p>
            <p>
                <strong> Дата:</strong>
                {{$data->date_delivery}}
            </p>
            <p>
                <strong> Город отправления:</strong>
            </p>
            <p>
                <strong> Город получения:</strong>
            </p>
            <p>
                <strong> Получатель:</strong>
                {{$data->recipient_name}}
            </p>
            <p>
                <strong> Адрес:</strong>
                {{$data->recipient_address}}
            </p>
            <p>
                <strong> Телефон:</strong>
                {{$data->recipient_phone}}
            </p>
            <p>
                <strong> Вес/Объём/Кол-во мест:</strong>
                {{$weight}}/{{$scope}}/{{$allPlace}}
            </p>
            <a href="/admin/bids" class="btn btn-default">Вернуться</a>
        </div>
    </div>
    <div class="col-xs-6 col-md-6">
    {{ Form::open(['route' => 'create-bid', 'method' => 'post', 'url' => 'admin/bids/update/'.$data->id]) }}
        <div class="form-group">
            <label for="exampleInputEmail1">Статус заявки</label>
            <select class="form-control" name="bid_status_id">
                @foreach($statusBids as $statusBidsItem)
                    <option value="{{$statusBidsItem->id}}" @if($statusBidsItem->id == $data->bid_status_id) checked @endif>{{$statusBidsItem->bid_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Дата и время фактического  получения</label>
            <input type="text" class="form-control datetimepicker-main" name="date_receiving">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Ваш комментарий</label>
            <textarea class="form-control" rows="3" name="recipient_comments"></textarea>
        </div>

        <button type="submit" class="btn btn-default">Сохранить изменения</button>
    {{ Form::close() }}
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('.datetimepicker-main').datetimepicker({
                format: 'DD.MM.YYYY',
                locale: 'ru'
            });
        });
    </script>
@stop