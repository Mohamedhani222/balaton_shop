
@extends('website.layouts.master')
@section('title')
{{ trans('website_navbar_trans.home') }}
@endsection

@section('content')
<main class="main">
    <br>
    <div class="container">
        @include('website.index_main.slider')
        @include('website.index_main.Site_services')
        @include('website.index_main.trend_product')
        <br>
        @include('website.index_main.trend_category')
        @include('website.index_main.Our_Company')
    </div>

</main>

@endsection
