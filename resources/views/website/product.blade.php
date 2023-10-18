@extends('website.layouts.master')
@section('title')
    {{$product->slug}}
@endsection
@section('css')

@endsection

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.xyz/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>


    <div class="container">
        <div class="mb-5">
            <input type="hidden" value="{{$product->qty}}" id="qty">
            <div class="my-4" style=" background-color: #faf7f7 ;padding: 15px ;padding-top: 21px">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a
                            href="{{route('get_categories')}}">{{ trans('website_index_trans.category') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product->category->slug}}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product->slug}}</li>
                </ol>
            </div>
            <div class="row g-2">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="detail-gallery">
                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                        <figure class="border-radius-10">
                            <img src="{{asset($product->image)}}" alt="product image">
                        </figure>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="detail-info">
                        <h2>{{trans('website_index_trans.name')}}</h2>

                        <h3 class="title-detail">{{$product->name}}</h3>
                        <h5>
                            @if($product->qty> 0)
                                <span class="float-end badge bg-success">{{trans('website_index_trans.status')}}</span>
                            @else
                                <span
                                    class="float-end badge bg-danger">{{trans('website_index_trans.not_status')}}</span>
                            @endif
                        </h5>


                        <div class="product-detail-rating">
                            <div class="pro-details-brand">
                                <span> Brands: <a href="#">balaton</a></span>
                            </div>
                            <div class="product-rate-cover text-end">
                                <div class="product-rate d-inline-block">
                                    <h5>
                                        @if($product->trend == 1)
                                            <span
                                                class="float-end badge bg-success">{{trans('website_index_trans.trending')}}</span>
                                        @else
                                            <span
                                                class="float-end badge bg-danger">{{trans('website_index_trans.not_trending')}}</span>
                                        @endif
                                    </h5>
                                    <div class="product-rating" style="width:90%">
                                    </div>
                                </div>

                                <span class="font-small ml-5 text-muted"> (25 reviews)</span>

                            </div>
                        </div>
                        <div class="clearfix product-price-cover">
                            <div class="product-price primary-color float-left">
                                <h3>{{trans('website_index_trans.price')}}</h3>
                                <ins><span class="text-brand">{{$product->price}}</span></ins>
                                <ins><span class="old-price font-md ml-15">{{$product->selling_price}}</span></ins>
                                <span class="save-price  font-md color3 ml-15">25% Off</span>
                            </div>
                        </div>
                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                        <div class="short-desc mb-30">
                            <h3>{{trans('website_index_trans.meta_description')}}</h3>
                            <p class="h4">{{$product->meta_description}}</p>
                            <p class="h4">{{$product->meta_title}} </p>
                            <h3>{{trans('website_index_trans.category.')}}</h3>
                            <p class="h2">{{$product->category->name}}</p>
                            <h3>{{trans('website_index_trans.meta_keywords')}}</h3>
                            @foreach($keywords as $keyword )
                                <span class="badge" style="background-color: #fa0000">{{$keyword}}</span>
                            @endforeach
                        </div>

                        <div class="product_sort_info font-xs mb-30">
                            <ul>
                                <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera Brand Warranty</li>
                                <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                            </ul>
                        </div>
                        <div class="row">

                            <div class="col-md-3 col-6">
                                @if($product->qty > 0)
                                    <h4 class="py-4">{{trans('website_index_trans.Quantity')}}</h4>
                                    <div class="input-group mb-3">
                                        <button class="input-group-text btn btn-outline-warning"
                                                onclick="increaseQTY()">+
                                        </button>
                                        <input type="text" class="form-control text-center" id="qty_value" readonly
                                               value="1">
                                        <button class="input-group-text btn btn-outline-warning"
                                                onclick="decreaseQTY()">-
                                        </button>


                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                        <div class="detail-extralink">

                            <div class="product-extra-link2">
                                <button class="btn btn-balaton" onclick="addToCart()">Add to cart</button>
                            </div>
                            <button class="btn btn-balaton" onclick="addToWishList()">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <style>svg {
                                            fill: #ffffff
                                        }</style>
                                    <path
                                        d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/>
                                </svg>
                            </button>
                            <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                        </div>
                        <div class="social-icons single-share">
                            <ul class="text-grey-5 d-inline-block">
                                <li><strong class="mr-10">Share this:</strong></li>
                                <li class="social-facebook"><a href="https://www.facebook.com/balaton2?mibextid=ZbWKwL"><img
                                            src="{{asset('assets/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a>
                                </li>
                                <li class="social-instagram"><a
                                        href="https://instagram.com/bala.ton2020?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D"><img
                                            src="{{asset('assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>

        var qty = $('#qty').val();

        function increaseQTY() {
            var value = parseInt($('#qty_value').val());
            value = isNaN(value) ? 0 : value;
            if (value < qty) {
                value++
                $('#qty_value').val(value)
            }
        }


        function decreaseQTY() {
            var value = parseInt($('#qty_value').val());
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--
                $('#qty_value').val(value)
            }
        }

        function addToCart() {
            var product_id = $('#product_id').val();
            var qty = $('#qty_value').val();
            console.log('product id is :' + product_id + 'and qty is :' + qty)
            $.ajax({
                method: 'POST',
                url: "{{route('cart.store')}}",
                data: {
                    'product_id': product_id,
                    'qty': qty
                },
                success: function (res) {
                    console.log(res)
                    alertify.success('added')
                }
            })
        }

        function addToWishList() {
            var product_id = $('#product_id').val();
            console.log('product id is :' + product_id )
            $.ajax({
                method: 'POST',
                url: "{{route('wishlist.store')}}",
                data: {
                    'product_id': product_id,
                },
                success: function (res) {
                    console.log(res)
                    alertify.success('added')
                }
            })
        }

    </script>

@endsection
