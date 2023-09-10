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
                                    {{ LaravelLocalization::getCurrentLocaleName() }}
                                    <img src="{{asset('assets/img/flags/ar.jpg') }}" alt="ar" style="max-width: 20px"><i
                                        class="fi-rs-angle-down"></i>
                                @else
                                    {{ LaravelLocalization::getCurrentLocaleName() }}
                                    <img src="{{asset('assets/img/flags/tr.jpg') }}" alt="tr" style="max-width: 20px"><i
                                        class="fi-rs-angle-down"></i>
                                @endif


                                <ul class="language-dropdown">
                                    <li>  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                               href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
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
                                <li>{{trans('website_navbar_trans.Get_fantastic_merchandise_at_up_to_50%_off')}} <a
                                        href="#">{{trans('website_navbar_trans.View_details')}}</a></li>
                                <li>{{trans('website_navbar_trans.Supper_Value_Deals_Save_more_with_coupons')}}</li>
                                <li>{{trans('website_navbar_trans.Trendy_25silver_jewelry_save_up_35%_off_today')}}<a
                                        href="#">{{trans('website_navbar_trans.Shop_now')}}</a></li>
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
                                                <a class="language-dropdown-active" href="#"><img
                                                        src="{{asset('assets/imgs/logoutdoor.png')}}">
                                                </a>
                                                <ul class="language-dropdown">
                                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            @endguest
                        </ul>
                    </div>
                </div>

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
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{url('/')}}"><img src="{{asset('assets/imgs/logo/logo.png')}}" alt="logo"></a>
                </div>

                <div class="header-right">
                    <div class="header-wrap">
                        <div class="logo logo-width-1" style="margin-left: 300px ; margin-right: 200px">
                            <form action="#">
                                <input type="text" placeholder="{{trans('website_navbar_trans.search')}}">
                            </form>
                        </div>
                        <div class="header-action-2">
                            <div class="header-action-icon-2">

                            </div>




                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="#">
                                    <img alt="Surfside Media" src="{{asset('assets/imgs/theme/icons/icon-cart.svg')}}">

                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">

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
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{url('/')}}"><img src="{{asset('assets/imgs/logo/logo.png')}}" alt="logo"></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a class="{{$route='index_page' ? 'active' : ''}}"style="font-size: 20px" href="{{url('/')}}">{{trans('website_navbar_trans.home')}}</a>
                                </li>
                                <li><a class="{{$route='categories_page'?'active':''}}"style="font-size: 20px" href="{{route('get_categories')}}">{{trans('website_navbar_trans.shop')}}</a>
                                </li>


                                    @auth()

                                        @if (Auth::user()->is_admin == 1)
                                        <li><a style="font-size: 20px" href="#">{{trans('website_navbar_trans.My_Account')}}<i
                                                    class="fi-rs-angle-down"></i></a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a style="font-size: 20px" href="{{route('dashboard')}}">{{trans('website_navbar_trans.dashboard')}}</a>
                                                </li>
                                                <li>
                                                    <a style="font-size: 20px" href="{{route('products.index')}}">{{trans('website_navbar_trans.Products')}}</a>
                                                </li>
                                                <li>
                                                    <a style="font-size: 20px" href="{{route('categories.index')}}">{{trans('website_navbar_trans.Categories')}}</a>
                                                </li>
                                            </ul>
                                        @else

                                        @endif
                                    @endif
                                </li>
                                <li><a  class="{{$route=='about_page' ? 'active' : ''}}" style="font-size: 20px" href="{{route('about')}}">{{trans('website_navbar_trans.About')}}</a></li>
                                <li><a class="{{$route=='contact_page' ? 'active' : ''}}" style="font-size: 20px" href="{{route('contact')}}">{{trans('website_navbar_trans.contact')}}</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-block">
                    <p>
                        <i class="fi-rs-smartphone"></i><span>{{trans('website_navbar_trans.contact')}}</span> {{trans('website_navbar_trans.905318312199+')}}
                    </p>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
{{--    end_header-bottom--}}


{{--start_mobile-header--}}
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{url('/')}}"><img src="{{asset('assets/imgs/logo/logo.png')}}" alt="logo"></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="{{trans('website_navbar_trans.search')}}">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            {{--end_mobile-header--}}

            <!-- mobile menu start -->
            <div class="mobile-menu-wrap mobile-header-border">
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                style="font-size: 20px"  href="{{url('/')}}">{{trans('website_navbar_trans.home')}}</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                style="font-size: 20px"  href="{{route('get_categories')}}">{{trans('website_navbar_trans.shop')}}</a>
                        </li>

                            @auth()

                                @if (Auth::user()->is_admin == 1)
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        style="font-size: 20px"   href="#">{{trans('website_navbar_trans.My_Account')}}</a>
                                    <ul class="dropdown">
                                        <li>
                                            <a style="font-size: 20px" href="{{route('dashboard')}}">{{trans('website_navbar_trans.dashboard')}}</a>
                                        </li>
                                        <li>
                                            <a style="font-size: 20px"href="{{route('products.index')}}">{{trans('website_navbar_trans.Products')}}</a>
                                        </li>
                                        <li>
                                            <a style="font-size: 20px" href="{{route('categories.index')}}">{{trans('website_navbar_trans.Categories')}}</a>
                                        </li>
                                    </ul>
                                @else

                                @endif
                            @endif
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                style="font-size: 20px" href="#">{{trans('website_navbar_trans.About')}}</a>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                style="font-size: 20px" href="#">{{trans('website_navbar_trans.contact')}}</a></li>


                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">


                                @if ( Config::get('app.locale')  == 'ar')
                                    {{ LaravelLocalization::getCurrentLocaleName() }}
                                    <img src="{{asset('assets/img/flags/ar.jpg') }}" alt="ar" style="max-width: 20px">
                                @else
                                    {{ LaravelLocalization::getCurrentLocaleName() }}
                                    <img src="{{asset('assets/img/flags/tr.jpg') }}" alt="tr" style="max-width: 20px">
                                @endif
                            </a>

                            <ul class="dropdown">
                                <li>  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    @endforeach
                                </li>
                            </ul>
                    </ul>
                </nav>
            </div>
            <div class="mobile-header-info-wrap mobile-header-border">
                <ul>
                    @guest
                        @if (Route::has('login'))
                            <li>


                                <a href="{{ route('login') }}">{{trans('website_navbar_trans.Log_In')}} </a>
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
                                        <a class="language-dropdown-active" href="#"><img
                                                src="{{asset('assets/imgs/logoutdoor.png')}}" style="width: 40px; ">
                                        </a>
                                        <ul class="language-dropdown">
                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              class="d-none">
                            @csrf
                        </form>
                    @endguest
                </ul>
                <div class="single-mobile-header-info">
                    <a href="#">{{trans('website_navbar_trans.905318312199+')}} </a>
                </div>
            </div>
            <div class="mobile-social-icon">
                <a href="https://www.facebook.com/balaton2?mibextid=ZbWKwL"><img src="{{asset('assets/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a>
                <a href="https://instagram.com/bala.ton2020?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D"><img src="{{asset('assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a>

            </div>
        </div>
    </div>
</div>
<!-- mobile menu end -->
