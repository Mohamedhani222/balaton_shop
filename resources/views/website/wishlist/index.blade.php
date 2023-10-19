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

            @if(auth()->check())
                @forelse($wishlistItems as $item)
            <a href="#url-product">
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
                @endif



        </div>
    </div>

@endsection
