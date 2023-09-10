@extends('website.layouts.master')
@section('title')
{{trans('website_index_trans.category')}}
@endsection
@section('content')
    <br>
    <div class="container" style="text-align: center">
        <h2 style="text-align: center"><span
                style="color: #fa0000 ;text-align: center">{{trans('website_index_trans.category')}}</span> {{trans('website_index_trans.trend')}}
        </h2>
        <div class="container" style="max-width: 500px">
            <hr class="text-center" style="max-width: 500px ;color: #fa0000">
        </div>
        <br><br>
        <div class="container text-center  w-80">
            <div class="row">

                @foreach($categories as $Category)
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 ">
                        <a href="{{route('get_category_slug',$Category->slug)}}">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img ">

                                        <img class="default-img" src="{{asset($Category->image)}}" alt="">

                                    </div>

                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-price">
                                        <span>{{$Category->name}}</span>
                                    </div>
                                    <div class="container" style="max-width: 300px">
                                        <hr class="text-center" style="max-width: 300px ;color: #fa0000">
                                    </div>
                                    <h3>{{$Category->meta_title}}</h3><br>

                                    <p class="card-text">{{$Category->meta_description}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
        <br>
    </div>
    </div>
@endsection
