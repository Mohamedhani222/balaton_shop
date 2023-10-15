<div class="container" style="text-align: center">
    <h3 style="text-align: center"><span
            style="color: #fa0000 ;text-align: center">{{trans('website_index_trans.category')}}</span> {{trans('website_index_trans.trend')}}
    </h3>
    <div class="owl-carousel trend_product owl-theme my-4">
        @foreach($categories as $Category)

            <a href="{{route('get_category_slug',$Category->slug)}}">
                <div class="product-cart-wrap mb-30">

                    <div class="product-img-action-wrap">
                        <div class="product-img product-img-zoom">

                            <img class="default-img" src="{{asset($Category->image)}}" alt="">

                        </div>

                    </div>
                    <div class="product-content-wrap">
                        <div class="product-price">
                            <span>{{$Category->name}}</span>
                        </div>
                        <h3>{{$Category->meta_title}}</h3><br>

                        <p class="card-text">{{$Category->meta_description}}</p>

                    </div>

                </div>
            </a>

        @endforeach
    </div>


</div>


