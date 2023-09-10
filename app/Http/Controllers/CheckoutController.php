<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Country;
use App\Models\Payments;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart = $user->orders()->withCount('products')->Status('IN_CART')->first();
        $countries =
            Cache::rememberForever('countries', function () {
                return Country::all();
            });
        if ($cart) {
            $cartItems = $cart->products()->get();
            return view('website.Checkout.index', compact('cart', 'cartItems', 'countries'));
        }

        abort(404);
    }

    public function store(CheckoutRequest $request)
    {
//return $request;
        $user = Auth::user();
        $order = $user->orders()->Status('IN_CART')->first();
        $user_address = $user->address;
        DB::beginTransaction();
        try {
            if ($request->use_user_address) {
                $order->shipping_address_id = $user_address->id;
                $order->save();
            } else {
                $new_address = ShippingAddress::create($request->validated());
                $order->shipping_address_id = $new_address->id;
                $order->save();
            }
            (new CashOnDelivery)->pay($user, $order);
            (new PaymentsController)->create_payment($user, $order);

            DB::commit();
            flash('Order Placed Successfully');
            return redirect()->route('index');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

    }


}
