@extends('website.layouts.master')
@section('title')
    cart
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table shopping-summery text-center clean">
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
                    @forelse($cartItems as $item)
                        <tr>
                            <td class="image product-thumbnail"><img src="{{Storage::url($item->image)}}" alt="#"></td>
                            <td class="product-des product-name"><h5 class="product-name">{{ $item->name}}</h5></td>
                            <td class="text-center" data-title="Stock"><h5
                                    class="qty-val">{{$item->pivot->quantity}}</h5></td>
                            <td class="action" data-title="Remove">{{$item->pivot->total_price}}</td>
                            <td class="action" data-title="Remove" style="color: red">
                                <form action="{{route('cart.destroy' ,$item->pivot->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm" type="submit">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <td style="width: 100%;" colspan="5">لا يوجد منتجات في الكارت </td>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-8">
                    <a href="/" class="btn  "><i
                            class="fi-rs-shopping-bag mr-10"></i>{{trans('category_trans.continue')}}</a>
                    <a href="{{route('checkout.index')}}" class="btn ">{{trans('website_navbar_trans.Checkout')}}</a>
                    @if(!Auth::user()->address)
                        <a href="{{route('checkout.index')}}" class="btn ">Complete Your Info</a>
                    @endif
                </div>
                <div class="col-4">
                    @if($cart)
                        <h3>{{$cart->total_price}}tl: {{trans('website_navbar_trans.total')}} </h3>
                    @else
                        <h3>0 tl: {{trans('website_navbar_trans.total')}} </h3>

                    @endif

                </div>
            </div>
            <br>
        </div>

@endsection
