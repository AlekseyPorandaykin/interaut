@extends('admin-pages.index')
@section('title', 'Клиенты')

@section('content')
    <div class="row">
        {{ Form::open(['route' => 'create-client', 'method' => 'get']) }}
        <button type="submit" class="btn btn-primary">Создать клиента</button>
        {{ Form::close() }}
    </div>

@endsection