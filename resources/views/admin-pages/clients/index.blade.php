@extends('admin-pages.index')
@section('title', 'Клиенты')

@section('content')
    <div class="row">
        {{ Form::open(['route' => 'create-client', 'method' => 'get']) }}
        <button type="submit" class="btn btn-primary">Создать клиента</button>
        {{ Form::close() }}
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ИД</th>
            <th>Наименование юридического лица</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
    @foreach($allClients as $clientItem)
            <tr>
                <th scope="row">{{$clientItem->id}}</th>
                <td>{{$clientItem->name_legal_entity}}</td>
                <td>
                    <a href="/admin/clients/edit/{{$clientItem->id}}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"> </span>&nbsp; Изменить</a>
                    <a href="/admin/clients/delete/{{$clientItem->id}}" class="btn btn-danger" onclick="if(!confirm('Удалить клиента')) return false;"><span class="glyphicon glyphicon-remove"> </span>&nbsp; Удалить</a>
                </td>
            </tr>
    @endforeach
        </tbody>
    </table>
@endsection