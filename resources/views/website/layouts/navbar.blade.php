<header class="header-area header-style-1 header-height-2">

    {{--    start_header-top--}}
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li>
                                @if ( Config::get('app.locale')  == 'ar')
                                    <img src="{{asset('assets/img/flags/ar.jpg') }}" class="mx-2" alt="ar" style="max-width: 20px">
                                    {{ LaravelLocalization::getCurrentLocaleName() }}
                                    <i class="fi-rs-angle-down"></i>
                                @else
                                    <img src="{{asset('assets/img/flags/tr.jpg') }}" class="mx-2" alt="tr" style="max-width: 20px">
                                    {{ LaravelLocalization::getCurrentLocaleName() }}
                                    <i class="fi-rs-angle-down"></i>
                                @endif


                                <ul class="language-dropdown">
                                    <li>  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                        @endforeach
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>{{trans('website_navbar_trans.Get_fantastic_merchandise_at_up_to_50%_off')}} <a href="#">{{trans('website_navbar_trans.View_details')}}</a></li>
                                <li>{{trans('website_navbar_trans.Supper_Value_Deals_Save_more_with_coupons')}}</li>
                                <li>{{trans('website_navbar_trans.Trendy_25silver_jewelry_save_up_35%_off_today')}}<a href="#">{{trans('website_navbar_trans.Shop_now')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            @guest
                                @if (Route::has('login'))
                                    <li>

                                        <i class="fi-rs-key"></i>
                                        <a href="{{ route('login') }}">{{trans('website_navbar_trans.Log_In')}}</a> /
                                    </li>
                                @endif
                                @if (Route::has('register'))
                                    <li>

                                        <a href="{{ route('register') }}">{{trans('website_navbar_trans.Sign_Up')}}</a>
                                    </li>
                                @endif
                            @else
                                <div class="col-xl-3 col-lg-4">
                                    <div class="header-info">
                                        <ul>
                                            <li>
                                                <a class="language-dropdown-active" href="#">
                                                    <i class="bi bi-arrow-right-circle-fill fs-4"></i>
                                                </a>
                                                <ul class="language-dropdown">
                                                    <li><a href="{{ route('logout') }}" onclick=" event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    end_header-top--}}

    {{--    start_header-middle--}}
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="logo logo-width-1">
                    <a href="{{url('/')}}"><img src="{{asset('assets/imgs/logo/logo.png')}}" alt="logo"></a>
                </div>
                <div class="w-100 mx-5">
                    <form action="#">
                        <input type="text" placeholder="{{trans('website_navbar_trans.search')}}" class="form-control">
                    </form>
                </div>
                <div class="header-right">
                    <div class="header-wrap">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon d-flex" href="#">
                                    <img alt="Surfside Media" src="{{asset('assets/imgs/theme/icons/search.png')}}">
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon d-flex" href="#">
                                    <img alt="Surfside Media" src="{{asset('assets/imgs/theme/icons/icon-heart.svg')}}">
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon d-flex" href="#">
                                    <img alt="Surfside Media" src="{{asset('assets/imgs/theme/icons/icon-cart.svg')}}">
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2" style="{{Config::get('app.locale') =='ar'?'left: 0; right: auto;':''}}">
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-button">  
                                            <a href="{{route('cart.index')}}" class="outline">{{trans('website_navbar_trans.Viewcart')}}</a>
                                            <a href="#" class="outline" >{{trans('website_navbar_trans.Checkout')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    end_header-middle--}}

    {{--    start_header-bottom--}}

    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container"> 
            <div class="header-wrap header-space-between position-relative">
                {{-- الشعار --}}
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{url('/')}}"><img src="{{asset('assets/imgs/logo/logo.png')}}" alt="logo"></a>
                </div>
                
                {{-- البحث --}}
                <div class="w-100 mx-2 input-navbar-mobile">
                    <form action="#">
                        <input type="text" placeholder="{{trans('website_navbar_trans.search')}}" class="form-control h-100">
                    </form>
                </div>
    
                    {{-- القوائم المنسدلة لقياسات سطح المكتب --}}
                <div class="header-nav d-none d-lg-flex w-100">
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block w-100">
                        <nav>
                            <ul class="d-flex justify-content-between">
                                <li><a class="{{$route='index_page' ? 'active' : ''}}" href="{{url('/')}}">{{trans('website_navbar_trans.home')}}</a>
                                </li>
    
                                @auth()
    
                                    @if (Auth::user()->is_admin == 1)
                                        <li><a href="#"> {{trans('website_navbar_trans.My_Account')}} <i class="fi-rs-angle-down"></i></a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="{{route('dashboard')}}">{{trans('website_navbar_trans.dashboard')}}</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('products.index')}}">{{trans('website_navbar_trans.Products')}}</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('categories.index')}}">{{trans('website_navbar_trans.Categories')}}</a>
                                                </li>
                                            </ul>
                                        </li>
                                    @else

                                    @endif
                                @endif
                                <li ><a href="#"> {{trans('website_navbar_trans.ELBISE')}} <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <center>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/SPOR-ELBISI')}}">{{trans('website_navbar_trans.SPORELBISI')}}</a></li>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/G%C3%9CNL%C3%9CK-ELBISI')}}">{{trans('website_navbar_trans.GÜNLÜKELBISI')}}</a></li>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/ABIYE-ELBISI')}}">{{trans('website_navbar_trans.ABIYEELBISI')}}</a></li>
                                        </center>
                                    </ul>
                                </li>
                                <li ><a href="#"> {{trans('website_navbar_trans.PAJAM&IÇGIYIM')}} <i class="fi-rs-angle-down"></i></a>
                                    <ul  class="sub-menu">
                                        <center>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/BLUZ')}}">{{trans('website_navbar_trans.BLUZ')}}</a></li>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/T-SHIRT')}}">{{trans('website_navbar_trans.T-SHIRT')}}</a></li>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/S%C3%9CVETER')}}">{{trans('website_navbar_trans.SÜVETER')}}</a></li>
                                        </center>
                                    </ul>
                                </li>
                                <li ><a href="#"> {{trans('website_navbar_trans.DIŞGIYIM')}} <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <center>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/TRENÇ&KAP')}}">{{trans('website_navbar_trans.TRENÇ&KAP')}}</a></li>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/FERACE&PARDÖSÜ')}}">{{trans('website_navbar_trans.FERACE&PARDÖSÜ')}}</a></li>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/HIRKA&YELEK')}}">{{trans('website_navbar_trans.HIRKA&YELEK')}}</a></li>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/TESSET%C3%9CR-CEKET')}}">{{trans('website_navbar_trans.TESSETÜRCEKET')}}</a></li>
                                        </center>
                                    </ul>
                                </li>
                                <li ><a href="#"> {{trans('website_navbar_trans.AITGIYIM')}} <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <center>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/PANTOLON')}}">{{trans('website_navbar_trans.PANTOLON')}}</a></li>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/KOT-PANTOLON')}}">{{trans('website_navbar_trans.KOTPANTOLON')}}</a></li>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/KLASIK-PANTOLON')}}">{{trans('website_navbar_trans.KLASIKPANTOLON')}}</a></li>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/SPOR-PANTOLON')}}">{{trans('website_navbar_trans.SPORPANTOLON')}}</a></li>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/ETEK')}}">{{trans('website_navbar_trans.ETEK')}}</a></li>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/TAYT')}}">{{trans('website_navbar_trans.TAYT')}}</a></li>
                                        </center> 
                                    </ul>
                                </li>
                                <li ><a href="#"> {{trans('website_navbar_trans.ÇANTA')}} <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <center>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/GÜNLÜK-ÇANTA')}}">{{trans('website_navbar_trans.GÜNLÜKÇANTA')}}</a></li>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/SIRT%20%C3%87ANTA')}}">{{trans('website_navbar_trans.SIRTÇANTA')}}</a></li>
                                        </center>
                                    </ul>
                                </li>
                                <li ><a href="#"> {{trans('website_navbar_trans.EŞARP')}} <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <center>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/KA%C5%9EE-%C5%9EAL')}}">{{trans('website_navbar_trans.KAŞEŞAL')}}</a></li>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/ÇORAP')}}">{{trans('website_navbar_trans.ÇORAP')}}</a></li>
                                        </center>
                                    </ul>
                                </li>
                                <li ><a href="#"> {{trans('website_navbar_trans.PIJAMA')}} <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <center>
                                            <h5>{{trans('website_navbar_trans.ERKEK')}}</h5>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/E%C5%9EOFMAN-ERKEK')}}">{{trans('website_navbar_trans.EŞOFMAN')}}</a></li>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/%C5%9EARDON-PIJAMA-ERKEK')}}">{{trans('website_navbar_trans.ŞARDONPIJAMA')}}</a></li>
    
    
                                            <h5>{{trans('website_navbar_trans.KADIN')}}</h5>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/E%C5%9EOFMAN-BAYANLAR')}}">{{trans('website_navbar_trans.EŞOFMAN')}}</a></li>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/%C5%9EARDON-PIJAMA-BAYANLAR')}}">{{trans('website_navbar_trans.ŞARDONPIJAMA')}}</a></li>
    
    
                                            <h5>{{trans('website_navbar_trans.ÇOCUK')}}</h5>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/E%C5%9EOFMAN-PIJAMA-COCUK')}}">{{trans('website_navbar_trans.EŞOFMAN')}}</a></li>
                                            <li><a href="{{url('https://balaton2.shop/ar/category/%C5%9EARDON-PIJAMA-COCUK')}}">{{trans('website_navbar_trans.ŞARDONPIJAMA')}}</a></li>
    
                                        </center>
                                    </ul>
                                </li>
    
    
    
                                <li><a   href="{{route('about')}}">{{trans('website_navbar_trans.About')}}</a></li>
                                <li><a  class="{{$route=='contact_page' ? 'active' : ''}}" href="{{route('contact')}}">{{trans('website_navbar_trans.contact')}}</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
{{--    end_header-bottom--}}

