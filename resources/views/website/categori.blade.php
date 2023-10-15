<!doctype html>
<html lang="{{Config::get('app.locale')}}" dir="{{Config::get('app.locale') =='ar'?'rtl':'ltr'}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width ,initial-scale=1 ">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('website.layouts.head')

    </head>
    <body>
        <nav class="nav-categori w-100">
            <div class="text-center">
                {{ trans('website_index_trans.category') }}
            </div>
        </nav>
        <div class="container">
            <div class="" style="margin: 70px 0;">
                <div class="row g-2 text-center">
                    <div class="col-12">
                        <a href="#"><div class="rounded bg-warning w-100" style="height: 100px;"></div></a>
                    </div>
                    {{-- <div class="col-6"><a href="#"><img src="https://tr.farnell.com/productimages/large/en_GB/3227412-40.jpg" alt=""></a></div> --}}
                    <div class="col-6">
                        <a href="#"><div class="rounded bg-danger w-100" style="height: 100px;"></div></a>
                    </div>
                    <div class="col-6"><a href="#"><div class="rounded bg-danger w-100" style="height: 100px;"></div></a></div>
                    <div class="col-6"><a href="#"><div class="rounded bg-info w-100" style="height: 100px;"></div></a></div>
                    <div class="col-6"><a href="#"><div class="rounded bg-success w-100" style="height: 100px;"></div></a></div>
                    <div class="col-6"><a href="#"><div class="rounded bg-danger w-100" style="height: 100px;"></div></a></div>
                    <div class="col-6"><a href="#"><div class="rounded bg-danger w-100" style="height: 100px;"></div></a></div>
                    <div class="col-6"><a href="#"><div class="rounded bg-danger w-100" style="height: 100px;"></div></a></div>
                    <div class="col-6"><a href="#"><div class="rounded bg-danger w-100" style="height: 100px;"></div></a></div>
                    <div class="col-12">
                        <a href="#"><div class="rounded bg-warning w-100" style="height: 100px;"></div></a>
                    </div>
                </div>
            </div>
        </div>




    @include('website.layouts.footer_script')
    @include('website.layouts.mobile-bottom-navigation')
    </body>

</html>
