@extends('admin-pages.index')
@section('title', 'Все заявки')

@section('content')
    @include('admin-pages.bids.table-show')

@endsection