<div class="container my-5" style="text-align: center">
<h3 style="text-align: center"><span style=" color: #fa0000 ; text-align: center">{{trans('website_index_trans.product')}}</span> {{trans('website_index_trans.trend')}}</h3>
<br>
<br>
<div class="owl-carousel trend_product owl-theme">
    @foreach($products as $product)
    <a href="{{route('get_product_slug',[$product->category->slug,$product->slug])}}">
        <div class="product-cart-wrap mb-30">
            <div class="product-img-action-wrap">
                <div class="product-img product-img-zoom">

                        <img class="default-img" src="{{asset($product->image)}}" alt="">

                </div>

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
            </div>
        </div>
    </a>
    @endforeach
</div>
<br>


</div>


