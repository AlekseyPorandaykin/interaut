@extends('admin-pages.index')
@section('title', 'Новая заявка')

@section('content')
    {{ Form::open(['route' => 'departure-schedule', 'method' => 'post', 'class' => 'form-inline', 'enctype' => 'multipart/form-data']) }}
        <div class="form-group">
            <label>Загрузить расписание отправлений</label>
            <input type="file" name="schedule">
        </div>
        <button type="submit" class="btn btn-default">Загрузить </button>
    {{ Form::close() }}
@endsection