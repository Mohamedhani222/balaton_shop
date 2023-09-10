@extends('website.layouts.master')
@section('title')
{{$category->name}}
@endsection

@section('content')


<div class=" " style=" background-color: #faf7f7 ;padding: 15px ;padding-top: 21px" >
<nav aria-label="breadcrumb">
    <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('get_categories')}}">{{ trans('website_index_trans.category') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
    </ol>
    </div>
  </nav>

</div>

<main class="main">
    <br>
    <div class="container" style="text-align: center">
        <div class="product-cart-wrap mb-30">
            <div class="product-img-action-wrap">

                        <img class="default-img" src="{{asset($category->image)}}" alt="">


            </div>
            <div class="product-content-wrap">
                <div class="product-price">
                    <span>{{$category->name}}</span>
                </div>
                <h3>{{$category->meta_title}}</h3><br>

                <p class="card-text">{{$category->meta_description}}</p>

            </div>
        </div>

    </div>




<div class="container  w-80" style="text-align: center ">


<h2>{{ trans('website_index_trans.product') }}</h2>

<div class="row">
@foreach($category->products as $product)

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12 ">
 <div class="product-cart-wrap mb-30" >
     <a href="{{route('get_product_slug',[$product->category->slug,$product->slug])}}">
         <div class="product-img product-img-zoom">


             <img class="default-img" src="{{asset($product->image)}}" alt="">

         </div>


         <div class="product-content-wrap">
        <div class="product-price">
            <span>{{$product->name}}</span>
        </div>
        <h3>{{$product->meta_title}}</h3><br>

        <p class="card-text">{{$product->meta_description}}</p>
        <div class="product-price">
            <span>{{$product->price}}</span>

            <span class="old-price">{{$product->selling_price}}</span>
        </div>
    </a>
    </div>
  </div>
</div>


@endforeach
</div>
</div>





</main>

@endsection
