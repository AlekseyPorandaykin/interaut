@extends('admin-pages.index')
@section('title', 'Скачать документы')

@section('content')

    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h3>Формирование документов</h3>
        <a href="/formation-documents/{{$id_bid}}/bullet-list" class="btn btn-default btn-lg btn-block" target="_blank">Скачать маркировочный лист (PDF): </a>
        <a href="/formation-documents/{{$id_bid}}/f103" class="btn btn-default btn-lg btn-block" target="_blank">Скачать Ф103 (PDF)</a>
        <a href="#" class="btn btn-default btn-lg btn-block">Скачать АПП (XLS)</a>
    </div>
    <div class="col-md-1"></div>

@endsection