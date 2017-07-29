@extends('admin-pages.index')
@section('title', 'Текущие заявки')

@section('content')
    @include('admin-pages.bids.table-show')

@endsection