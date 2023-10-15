<footer class="main">
    <div class="container my-5">
        <div class="row g-4">
            <div class="col-12">
                <div class="newsletter p-30 rounded">
                    <div class="row align-items-center">
                        <div class="col-md flex-horizontal-center">
                            <img class="icon-email mx-1" src="{{asset('assets/imgs/theme/icons/icon-email.svg')}}" alt="">
                            <h5>{{trans('website_footer_trans.Sign_up_to_Newsletter')}}</h5>
                        </div>
                        <div class="col-md-4 my-4 my-md-0 des">
                            <h5>{{trans('website_footer_trans.and_receive_$25_coupon_for_first_shopping')}}</h5>
                        </div>
                        <div class="col-md">
                            
                            <!-- Subscribe Form -->
                            <form class="form-subcriber d-flex wow fadeIn animated">
                                <button class="btn bg-dark text-white" type="submit">{{trans('website_footer_trans.Subscribe')}}</button>
                                <input type="email" class="form-control bg-white font-small" placeholder="{{trans('website_footer_trans.Enter_your_email')}}">
                            </form>
                            <!-- End Subscribe Form -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="logo-width-1 wow fadeIn animated">
                    <a href="/"><img src="{{asset('assets/imgs/logo/logo.png')}}" alt="logo"></a>
                </div>
            </div>
            <div class="col-md-3">
                <h4 class="fw-bolx text-grey-4 my-2">روابط سريعة</h4>
                <p class="fs-5 m-2"><a href="{{url('/')}}">{{trans('website_navbar_trans.home')}}</a></p>
                <p class="fs-5 m-2"><a href="{{route('get_categories')}}">{{trans('website_navbar_trans.shop')}}</a></p>
                <p class="fs-5 m-2"><a href="{{route('about')}}">{{trans('website_navbar_trans.About')}}</a></p>
                <p class="fs-5 m-2"><a href="{{route('contact')}}">{{trans('website_navbar_trans.contact')}}</a></p>
                
            </div>
            <div class="col-md-3">
                <h4 class="fw-bolx text-grey-4 my-2">{{trans('website_navbar_trans.contact')}}</h4>
                <p class="wow m-2 fadeIn animated">
                    <strong>{{trans('website_footer_trans.Address:')}} </strong>TURKYE
                </p>
                <p class="wow m-2 fadeIn animated">
                    <strong>{{trans('website_footer_trans.Phone')}} </strong>{{trans('website_navbar_trans.905318312199+')}}
                </p>
                <p class="wow m-2 fadeIn animated">
                    <strong>{{trans('website_footer_trans.Email')}} </strong>Sales@balaton.com
                </p>
            </div>
            <div class="col-md-3">

                <h4 class="fw-bolx text-grey-4 my-2">{{trans('website_footer_trans.Follow_Us')}}</h4>
                <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                    <a href="https://www.facebook.com/balaton2?mibextid=ZbWKwL" class="m-2"><img src="{{asset('assets/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a>
                    <a href="https://instagram.com/bala.ton2020?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D" class="m-2"><img src="{{asset('assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a>
                </div>
            </div>
            <div class="col-12">

                <div class="text-center">
                    <p class="mb-20 wow fadeIn animated">{{trans('website_footer_trans.Secured_Payment_Gateways')}}</p>
                    <img class="wow fadeIn animated" src="{{asset('assets/imgs/theme/payment-method.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="footer-bottom my-3"></div>
            <div class="text-center">
                <p class="">
                    &copy; <strong class="text-brand"><a href="#">balaton</a></strong> {{trans('website_footer_trans.All_rights_reserved')}}
                </p>
            </div>
            <div class="my-3"><br></div> 
        </div>
    </div>
</footer>
@include('website.layouts.mobile-bottom-navigation')
