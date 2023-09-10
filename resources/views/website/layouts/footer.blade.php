<footer class="main">
    <section class="newsletter p-30 text-white wow fadeIn animated">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-md-3 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col flex-horizontal-center">
                            <img class="icon-email" src="{{asset('assets/imgs/theme/icons/icon-email.svg')}}" alt="">
                            <h4 class="font-size-20 mb-0 ml-3">{{trans('website_footer_trans.Sign_up_to_Newsletter')}}</h4>
                        </div>
                        <div class="col my-4 my-md-0 des">
                            <h5 class="font-size-15 ml-4 mb-0">{{trans('website_footer_trans.and_receive_$25_coupon_for_first_shopping')}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- Subscribe Form -->
                    <form class="form-subcriber d-flex wow fadeIn animated">
                        <input type="email" class="form-control bg-white font-small" placeholder="{{trans('website_footer_trans.Enter_your_email')}}">
                        <button class="btn bg-dark text-white" type="submit">{{trans('website_footer_trans.Subscribe')}}</button>
                    </form>
                    <!-- End Subscribe Form -->
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widget-about font-md mb-md-5 mb-lg-0">
                        <div class="logo logo-width-1 wow fadeIn animated">
                            <a href="#"><img src="{{asset('assets/imgs/logo/logo.png')}}" alt="logo"></a>
                        </div>
                        <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">{{trans('website_navbar_trans.contact')}}</h5>
                        <p class="wow fadeIn animated">
                            <strong>{{trans('website_footer_trans.Address:')}} </strong>TURKYE
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>{{trans('website_footer_trans.Phone')}} </strong>{{trans('website_navbar_trans.905318312199+')}}
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>{{trans('website_footer_trans.Email')}} </strong>Sales@balaton.com
                        </p>
                        <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">{{trans('website_footer_trans.Follow_Us')}}</h5>
                        <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                            <a href="https://www.facebook.com/balaton2?mibextid=ZbWKwL"><img src="{{asset('assets/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a>
                            <a href="https://instagram.com/bala.ton2020?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D"><img src="{{asset('assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <h5  class="widget-title wow fadeIn animated"><a href="{{url('/')}}">{{trans('website_navbar_trans.home')}}</a></h5>
                    <h5 class="widget-title wow fadeIn animated"><a href="{{route('about')}}">{{trans('website_navbar_trans.About')}}</a></h5>
                    <h5 class="widget-title wow fadeIn animated"><a href="{{route('contact')}}">{{trans('website_navbar_trans.contact')}}</a></h5>
                </div>

                <div class="col-lg-2  col-md-3">
                    <h5 class="widget-title wow fadeIn animated"><a href="{{route('get_categories')}}">{{trans('website_navbar_trans.shop')}}</a></h5>

                </div>
                <div class="col-lg-4 mob-center">

                        <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                            <p class="mb-20 wow fadeIn animated">{{trans('website_footer_trans.Secured_Payment_Gateways')}}</p>
                            <img class="wow fadeIn animated" src="{{asset('assets/imgs/theme/payment-method.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container pb-20 wow fadeIn animated mob-center">
        <div class="row">
            <div class="col-12 mb-20">
                <div class="footer-bottom"></div>
            </div>

<div style="text-align: center">
            <p class=" ">
                &copy; <strong class="text-brand"><a href="#">balaton</a></strong> {{trans('website_footer_trans.All_rights_reserved')}}
            </p></div>
        </div>
    </div>
</footer>
