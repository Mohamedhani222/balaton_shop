@extends('website.layouts.master')
@section('title')
    cart
@endsection

@section('content')
<div class="container">
    <div class="my-5">

        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                <tr class="main-heading">
                    <th scope="col">{{trans('category_trans.image')}}</th>
                    <th scope="col">{{trans('category_trans.name')}}</th>
                    <th scope="col">{{trans('category_trans.qty')}}</th>
                    <th scope="col">{{trans('category_trans.price')}}</th>
                    <th scope="col">{{trans('category_trans.action')}}</th>

                </tr>
                </thead>
                <tbody>
@auth
    @forelse($cartItems as $item)
                    <tr>
                        <td >
{{--                            <img src="{{Storage::url($item->image)}}" alt="#">--}}
                            <div class="flex-shrink-0">
                                <img src="{{asset($item->image)}}" alt="" width="35" class="img-fluid">
                            </div>

                        </td>




                        <td class="product-des product-name"><h5 class="product-name">{{ $item->name}}</h5></td>
                        <td class="text-center" data-title="Stock"><h5
                                class="qty-val">{{$item->pivot->quantity}}</h5></td>
                        <td class="action" data-title="Remove">{{$item->pivot->total_price}}</td>
                        <td class="action" data-title="Remove" style="color: red">

                            <form action="{{route('cart.destroy' ,'test')}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="item_id" value="{{$item->pivot->id}}">
                                <button class="btn btn-balaton" type="submit">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <td colspan="5">لا يوجد منتجات في الكارت </td>
                @endforelse

@endauth

{{--                    @if(!$cartItems)--}}
{{--                        <td colspan="5">لا يوجد منتجات في الكارت </td>--}}
{{--                    @else--}}
@guest
    @if(isset($cartItems))
                    @foreach($cartItems as $item)
                        <tr>
                        <td >
                            {{--                            <img src="{{Storage::url($item->image)}}" alt="#">--}}
                            <div class="flex-shrink-0">
                                <img src="{{asset($item['product']['image'])}}" alt="" width="35" class="img-fluid">
                            </div>

                        </td>


                        <td class="product-des product-name"><h5 class="product-name">{{ $item['product']['name']}}</h5></td>
                        <td class="text-center" data-title="Stock"><h5
                                class="qty-val">{{$item['qty']}}</h5></td>
                        <td class="action" data-title="Remove">{{$item['qty'] * $item['product']['price']}}</td>
                        <td class="action" data-title="Remove" style="color: red">
                            <form action="{{route('cart.destroy' ,$item['product']['id'])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-balaton" type="submit">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
    @endif
@endguest
{{--                @endif--}}

                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="my-4 p-3 border rounded">
                    <div class="row">
                        @if(isset($cart))
                            <div class="col-6">{{trans('website_navbar_trans.total')}}</div>
                            <div class="col-6" style="direction: ltr">{{$cart->total_price}}TL </div>
                            <div class="col-6">{{trans('website_navbar_trans.delivery')}} </div>
                            <div class="col-6" style="direction: ltr">25TL</div>
                            <div class="col-6">{{trans('website_navbar_trans.Taxes')}} </div>
                            <div class="col-6" style="direction: ltr">18%</div>
                            <div class="col-6">{{trans('website_navbar_trans.alltotal')}} </div>
                            <div class="col-6" style="direction: ltr">    {{ ($cart->total_price > 0) ? (($cart->total_price + 25) * 1.18) : $cart->total_price }}TL</div>
                        @else
                            <div class="col-6">{{trans('website_navbar_trans.total')}} </div>
                            <div class="col-6" style="direction: ltr">0TL</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="d-flex justify-content-around my-5">
                    <a href="/" class="btn btn-balaton "><i class="fi-rs-shopping-bag mx-1"></i>{{trans('category_trans.continue')}}</a>
{{--                    <!--<a href="{{route('checkout.index')}}" class="btn btn-balaton">{{trans('website_navbar_trans.Checkout')}}</a>-->--}}

                    @if(!Auth::user()?->address)
                        <a href="{{route('checkout.index')}}" class="btn btn-balaton">{{trans('website_navbar_trans.Checkout')}}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
