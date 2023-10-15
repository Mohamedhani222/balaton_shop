<!doctype html>
<html lang="{{Config::get('app.locale')}}" dir="{{Config::get('app.locale') =='ar'?'rtl':'ltr'}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width ,initial-scale=1 ">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
    @include('website.layouts.head')

</head>
<body>
@include('website.layouts.navbar')


@yield('content')


@include('website.layouts.footer_script')
@include('website.layouts.footer')
</body>

</html>
