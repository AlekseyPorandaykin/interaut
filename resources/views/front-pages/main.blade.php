@extends('front-pages.index')
@section('title', 'Главная страница')

@section('content')
    <div class="col-md-1"></div>
    <div class="col-md-10">
        @include('front-pages.bids.bid-client')
    </div>
    <div class="col-md-1"></div>

@endsection