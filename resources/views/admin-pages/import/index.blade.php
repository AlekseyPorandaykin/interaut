@extends('admin-pages.index')
@section('title', 'Новая заявка')

@section('content')

    {{ Form::open(['route' => 'import-city', 'method' => 'post', 'class' => 'form-inline', 'enctype' => 'multipart/form-data']) }}
    <div class="form-group">
        <label>Загрузить города</label>
        <input type="file" name="city">
    </div>
    <button type="submit" class="btn btn-default">Загрузить </button>
    {{ Form::close() }}



    {{ Form::open(['route' => 'departure-schedule', 'method' => 'post', 'class' => 'form-inline', 'enctype' => 'multipart/form-data']) }}
        <div class="form-group">
            <label>Загрузить расписание отправлений</label>
            <input type="file" name="schedule">
        </div>
        <button type="submit" class="btn btn-default">Загрузить </button>
    {{ Form::close() }}


    {{ Form::open(['route' => 'import-tariffs', 'method' => 'post', 'class' => 'form-inline', 'enctype' => 'multipart/form-data']) }}
    <div class="form-group">
        <label>Тарифы отправлений</label>
        <input type="file" name="tariffs">
    </div>
    <button type="submit" class="btn btn-default">Загрузить </button>
    {{ Form::close() }}
@endsection