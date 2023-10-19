@extends('website.layouts.master')
@section('title')
    wishlist
@endsection

@section('content')

    <div class="container mt-3" style="text-align: center">
        <h3 style="text-align: center">
            <span style="color: #fa0000 ;text-align: center">المفضلة</span>
        </h3>
        <div class="owl-carousel trend_product owl-theme my-4">

            @auth
                @forelse($wishlistItems as $item)
                    <a href="{{route('get_product_slug',[$item->category->slug,$item->slug])}}">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <img class="default-img" src="{{asset($item->image)}}" alt="">
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-price">
                                    <span>{{$item->name}}</span>
                                </div>
                                {{--                        <h3>عنوان المنتج</h3><br>--}}
                                <p class="card-text">{{$item->price}}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    لايوجد منتجات
                @endforelse
            @endauth
            @guest
                @if(isset($wishlistItems))
                    @foreach($wishlistItems as $item)
                        <a href="#url-product">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <img class="default-img" src="{{asset($item['product']['image'])}}" alt="">
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-price">
                                        <span>{{$item['product']['name']}}</span>
                                    </div>
                                    {{--                        <h3>عنوان المنتج</h3><br>--}}
                                    <p class="card-text">{{$item['product']['price']}}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    لايوجد منتجات
                @endif

            @endguest
        </div>
    </div>

@endsection
