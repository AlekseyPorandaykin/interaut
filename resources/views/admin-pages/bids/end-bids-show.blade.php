@extends('admin-pages.index')
@section('title', 'Исполненные заявки')

@section('content')
    @include('admin-pages.bids.table-show')

@endsection