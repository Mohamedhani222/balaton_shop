
<div class="mobile-bottom-navigation">

    <button class="action-btn" data-mobile-menu-open-btn="" id="sidebarOpen">
      <ion-icon name="menu-outline" role="img" class="md hydrated" aria-label="menu outline"></ion-icon>
    </button>
    
    <a href="{{route('cart.index')}}" class="action-btn">
      <ion-icon name="bag-handle-outline" role="img" class="md hydrated" aria-label="bag handle outline"></ion-icon>
    
      <span class="count">0</span>
    </a>
    
    <a href="/" class="action-btn">
      <ion-icon name="home-outline" role="img" class="md hydrated" aria-label="home outline"></ion-icon>
    </a>
    
    <a href="#" class="action-btn">
      <ion-icon name="heart-outline" role="img" class="md hydrated" aria-label="heart outline"></ion-icon>
    
      <span class="count">0</span>
    </a>
    
    <a href="{{route('categori')}}" class="action-btn" data-mobile-menu-open-btn="">
      <ion-icon name="grid-outline" role="img" class="md hydrated" aria-label="grid outline"></ion-icon>
    </a>
    
</div>

<nav class="sidebar">
    <div class="mobile-header-wrapper-inner">
        <div class="row g-1">
            <div class="col-12">
                <a href="{{url('/')}}"><img src="{{asset('assets/imgs/logo/logo.png')}}" alt="logo"></a>
            </div>
            <div class="col-12">
                <p class="mb-2">
                    <i class="fi-rs-smartphone mx-1"></i><span>{{trans('website_navbar_trans.contact')}}</span> {{trans('website_navbar_trans.905318312199+')}}
                </p>
            </div>
            <div class="col-6">
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="btn btn-balaton w-100 text-white py-2">
                            <i class="bi bi-box-arrow-right mx-1"></i>
                             {{trans('website_navbar_trans.Log_In')}}
                        </a>
                    @endif
                @else
                        <a href="{{ route('logout') }}" class="btn btn-balaton w-100 text-white py-2" onclick=" event.preventDefault(); document.getElementById('logout-form').submit();" >
                            <i class="bi bi-box-arrow-right mx-1"></i>
                            {{trans('website_navbar_trans.logout')}}
                        </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest            
            </div>
            <div class="col-6">
                <a href="{{route('cart.index')}}" class="btn btn-success w-100 text-white py-2"> 
                    <i class="bi bi-cart4 mx-1"></i>
                    {{trans('website_navbar_trans.sparislarim')}}
                </a>
            </div>
            <div class="col-12">
                <div class="p-2">
                    <ul class="mobile-menu">
                        <li>
                            <a href="{{url('/')}}">{{trans('website_navbar_trans.home')}}</a>
                        </li>
                        @auth()
                            @if (Auth::user()->is_admin == 1)
                                <li class="menu-item-has-children">
                                    <div class="d-flex justify-content-between align-items-center" id="OpenMenu">
                                        <a href="#">{{trans('website_navbar_trans.My_Account')}}</a>
                                        <div class="icon fs-4 fw-bold">+</div>
                                    </div>
                                    <ul class="dropdown my-2 mx-3">
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
                        <li class="menu-item-has-children">
                            <div class="d-flex justify-content-between align-items-center" id="OpenMenu">
                                <a href="#">{{trans('website_navbar_trans.ELBISE')}}</a>
                                <div class="icon fs-4 fw-bold">+</div>
                            </div>
                            <ul class="dropdown my-2 mx-3">
                                <li><a href="{{url('https://balaton2.shop/ar/category/SPOR-ELBISI')}}">{{trans('website_navbar_trans.SPORELBISI')}}</a></li>
                                <li><a href="{{url('https://balaton2.shop/ar/category/G%C3%9CNL%C3%9CK-ELBISI')}}">{{trans('website_navbar_trans.GÜNLÜKELBISI')}}</a></li>
                                <li><a href="{{url('https://balaton2.shop/ar/category/ABIYE-ELBISI')}}">{{trans('website_navbar_trans.ABIYEELBISI')}}</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <div class="d-flex justify-content-between align-items-center" id="OpenMenu">
                                <a href="#">{{trans('website_navbar_trans.PAJAM&IÇGIYIM')}}</a>
                                <div class="icon fs-4 fw-bold">+</div>
                            </div>
                            <ul class="dropdown my-2 mx-3">
                                <li><a href="{{url('https://balaton2.shop/ar/category/BLUZ')}}">{{trans('website_navbar_trans.BLUZ')}}</a></li>
                                <li><a href="{{url('https://balaton2.shop/ar/category/T-SHIRT')}}">{{trans('website_navbar_trans.T-SHIRT')}}</a></li>
                                <li><a href="{{url('https://balaton2.shop/ar/category/S%C3%9CVETER')}}">{{trans('website_navbar_trans.SÜVETER')}}</a></li>
                            </ul>
                        </li>
                        <li  class="menu-item-has-children">
                            <div class="d-flex justify-content-between align-items-center" id="OpenMenu">
                                <a href="#">{{trans('website_navbar_trans.DIŞGIYIM')}}</a>
                                <div class="icon fs-4 fw-bold">+</div>
                            </div>
                            <ul class="dropdown my-2 mx-3">
                                <li><a href="{{url('https://balaton2.shop/ar/category/TRENÇ&KAP')}}">{{trans('website_navbar_trans.TRENÇ&KAP')}}</a></li>
                                <li><a href="{{url('https://balaton2.shop/ar/category/FERACE&PARDÖSÜ')}}">{{trans('website_navbar_trans.FERACE&PARDÖSÜ')}}</a></li>
                                <li><a href="{{url('https://balaton2.shop/ar/category/HIRKA&YELEK')}}">{{trans('website_navbar_trans.HIRKA&YELEK')}}</a></li>
                                <li><a href="{{url('https://balaton2.shop/ar/category/TESSET%C3%9CR-CEKET')}}">{{trans('website_navbar_trans.TESSETÜRCEKET')}}</a></li>
                            </ul>
                        </li>

                        <li class="menu-item-has-children">
                            <div class="d-flex justify-content-between align-items-center" id="OpenMenu">
                                <a href="#">{{trans('website_navbar_trans.AITGIYIM')}}</a>
                                <div class="icon fs-4 fw-bold">+</div>
                            </div>
                            <ul class="dropdown my-2 mx-3">
                                <li><a href="{{url('https://balaton2.shop/ar/category/PANTOLON')}}">{{trans('website_navbar_trans.PANTOLON')}}</a></li>
                                <li><a href="{{url('https://balaton2.shop/ar/category/KOT-PANTOLON')}}">{{trans('website_navbar_trans.KOTPANTOLON')}}</a></li>
                                <li><a href="{{url('https://balaton2.shop/ar/category/KLASIK-PANTOLON')}}">{{trans('website_navbar_trans.KLASIKPANTOLON')}}</a></li>
                                <li><a href="{{url('https://balaton2.shop/ar/category/SPOR-PANTOLON')}}">{{trans('website_navbar_trans.SPORPANTOLON')}}</a></li>
                                <li><a href="{{url('https://balaton2.shop/ar/category/ETEK')}}">{{trans('website_navbar_trans.ETEK')}}</a></li>
                                <li><a href="{{url('https://balaton2.shop/ar/category/TAYT')}}">{{trans('website_navbar_trans.TAYT')}}</a></li>
                            </ul>
                        </li>

                        <li  class="menu-item-has-children">
                            <div class="d-flex justify-content-between align-items-center" id="OpenMenu">
                                <a href="#">{{trans('website_navbar_trans.ÇANTA')}}</a>
                                <div class="icon fs-4 fw-bold">+</div>
                            </div>
                            <ul class="dropdown my-2 mx-3">
                                <li><a href="{{url('https://balaton2.shop/ar/category/GÜNLÜK-ÇANTA')}}">{{trans('website_navbar_trans.GÜNLÜKÇANTA')}}</a></li>
                                <li><a href="{{url('https://balaton2.shop/ar/category/SIRT%20%C3%87ANTA')}}">{{trans('website_navbar_trans.SIRTÇANTA')}}</a></li>
                            </ul>
                        </li>
                        <li  class="menu-item-has-children">
                            <div class="d-flex justify-content-between align-items-center" id="OpenMenu">
                                <a href="#">{{trans('website_navbar_trans.EŞARP')}}</a>
                                <div class="icon fs-4 fw-bold">+</div>
                            </div>
                            <ul class="dropdown my-2 mx-3">
                                <li><a href="{{url('https://balaton2.shop/ar/category/KA%C5%9EE-%C5%9EAL')}}">{{trans('website_navbar_trans.KAŞEŞAL')}}</a></li>
                                <li><a href="{{url('https://balaton2.shop/ar/category/ÇORAP')}}">{{trans('website_navbar_trans.ÇORAP')}}</a></li>
                            </ul>
                        </li>
                        <li  class="menu-item-has-children">
                            <div class="d-flex justify-content-between align-items-center" id="OpenMenu">
                                <a href="#">{{trans('website_navbar_trans.PIJAMA')}}</a>
                                <div class="icon fs-4 fw-bold">+</div>
                            </div>
                            <ul class="dropdown my-2 mx-3">
                                <h5>{{trans('website_navbar_trans.ERKEK')}}</h5>
                                <li><a href="{{url('https://balaton2.shop/ar/category/E%C5%9EOFMAN-ERKEK')}}">{{trans('website_navbar_trans.EŞOFMAN')}}</a></li>
                                <li><a href="{{url('https://balaton2.shop/ar/category/%C5%9EARDON-PIJAMA-ERKEK')}}">{{trans('website_navbar_trans.ŞARDONPIJAMA')}}</a></li>
                                <h5>{{trans('website_navbar_trans.KADIN')}}</h5>
                                <li><a href="{{url('https://balaton2.shop/ar/category/E%C5%9EOFMAN-BAYANLAR')}}">{{trans('website_navbar_trans.EŞOFMAN')}}</a></li>
                                <li><a href="{{url('https://balaton2.shop/ar/category/%C5%9EARDON-PIJAMA-BAYANLAR')}}">{{trans('website_navbar_trans.ŞARDONPIJAMA')}}</a></li>
                                <h5>{{trans('website_navbar_trans.ÇOCUK')}}</h5>
                                <li><a href="{{url('https://balaton2.shop/ar/category/E%C5%9EOFMAN-PIJAMA-COCUK')}}">{{trans('website_navbar_trans.EŞOFMAN')}}</a></li>
                                <li><a href="{{url('https://balaton2.shop/ar/category/%C5%9EARDON-PIJAMA-COCUK')}}">{{trans('website_navbar_trans.ŞARDONPIJAMA')}}</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('about')}}">{{trans('website_navbar_trans.About')}}</a>
                        </li>
                        <li>
                            <a href="{{route('contact')}}">{{trans('website_navbar_trans.contact')}}</a>
                        </li>
                        <li class="menu-item-has-children">
                            <div class="d-flex justify-content-between align-items-center" id="OpenMenu">
                                <a href="#">
                                    @if ( Config::get('app.locale')  == 'ar')
                                        <img src="{{asset('assets/img/flags/ar.jpg') }}" class="mx-1" alt="ar" style="max-width: 20px">
                                        {{ LaravelLocalization::getCurrentLocaleName() }}
                                    @else
                                        <img src="{{asset('assets/img/flags/tr.jpg') }}" class="mx-1" alt="tr" style="max-width: 20px">
                                        {{ LaravelLocalization::getCurrentLocaleName() }}
                                    @endif
                                </a>
                                <div class="icon fs-4 fw-bold">+</div>
                            </div>
                            <ul class="dropdown my-2 mx-3">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>  
                                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <div class="mobile-social-icon">
                        <a href="https://www.facebook.com/balaton2?mibextid=ZbWKwL"><img src="{{asset('assets/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a>
                        <a href="https://instagram.com/bala.ton2020?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D"><img src="{{asset('assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a>
                    </div>
                    <div class="my-4">
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<script>
    const sidebar = document.querySelector(".sidebar");
    const sidebarOpen = document.querySelector("#sidebarOpen");
    
    sidebarOpen.addEventListener("click", () => sidebar.classList.toggle("open"));
   
    document.addEventListener('DOMContentLoaded', function() {
        const menuItemsWithChildren = document.querySelectorAll('.menu-item-has-children');

        menuItemsWithChildren.forEach(function(item) {
            const openMenu = item.querySelector('#OpenMenu');
            const dropdown = item.querySelector('.dropdown');

            openMenu.addEventListener('click', function(event) {
                event.preventDefault();
                dropdown.classList.toggle('open');
                // تغيير إشارة + إلى - والعكس
                const icon = openMenu.querySelector('.icon'); // افتراضيًا، يكون لديك عنصر بوضع الاختيار هناك يحتوي على الأيقونة
                icon.textContent = dropdown.classList.contains('open') ? '-' : '+';

            });
        });

        // إغلاق القائمة عند النقر خارجها
        document.addEventListener('click', function(event) {
            menuItemsWithChildren.forEach(function(item) {
                const dropdown = item.querySelector('.dropdown');
                if (dropdown.classList.contains('open') && !item.contains(event.target)) {
                    dropdown.classList.remove('open');
                    // استعادة إشارة الزائد
                    const icon = item.querySelector('.icon');
                    icon.textContent = '+';

                }
            });
        });
    });

</script>