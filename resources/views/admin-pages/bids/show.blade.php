@extends('admin-pages.index')
@section('title', 'Все заявки')

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Номер заявки</th>
            <th>Дата получения</th>
            <th>Статус</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->date_delivery}}</td>
            <td>{{$item->bid_name}}</td>
            <td>@if ($item->bid_status_id == 1)<a href="/admin/bids/edit/{{$item->id}}" class="btn btn-primary">Изменить</a> @else &nbsp; @endif</td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection