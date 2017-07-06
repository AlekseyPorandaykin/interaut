@extends('admin-pages.index')
@section('title', 'Изменить заявку')

@section('content')
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

        <button type="submit" class="btn btn-default">Изменить</button>
    {{ Form::close() }}

@endsection
@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('.datetimepicker-main').datetimepicker();
        });
    </script>
@stop