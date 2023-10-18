<?php

namespace App\Services;

use App\Models\OrderItem;
use App\Models\product;
use Illuminate\Support\Facades\DB;

class SessionCart
{
    public function add_to_cart($request, $product, $qty): void
    {
        if (!$request->session()->has('cart')) {
            $cart = [];
        } else {
            $cart = $request->session()->get('cart');
        }
        if (array_key_exists($product->id, $cart)) {
            $cart[$product->id]['qty'] += $qty;
        } else {
            $cart[$product->id] = [
                'product' => $product,
                'qty' => $qty
            ];
        }
        $request->session()->put('cart', $cart);

    }

    public function addToCartAfterLogin(): void
    {
        $user = \auth()->user();

        if (session()->has('cart')) {
            $cart = session('cart');
            foreach ($cart as $productID => $item) {
                $product = product::findOrFail($productID);
                $order = $user->orders()->Status('IN_CART')->firstOrCreate(['user_id' => $user->id]);
                $items = OrderItem::updateOrInsert([
                    'order_id' => $order->id, 'product_id' => $product->id
                ], [
                    'quantity' => DB::raw('quantity + ' . $item['qty']),  // Increment quantity
                    'unit_price' => $product->price,
                    'total_price' => DB::raw('total_price + ' . ($item['qty'] * $product->price)), // Update total_price
                ]);
                $totalPrice = $items->sum('total_price');
                $order->total_price = $totalPrice;
                $order->save();
            }
            session()->forget('cart');
        }
    }

    public function destroy($id): void
    {
        $cart = session('cart');
        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }

    }

//    WishList //
    public function add_to_wishlist($request, $product): void
    {
        if (!$request->session()->has('wishlist')) {
            $wishlist = [];
        } else {
            $wishlist = $request->session()->get('wishlist');
        }
        if (!array_key_exists($product->id, $wishlist)) {
            $wishlist[$product->id] = [
                'product' => $product,
            ];
        }
        $request->session()->put('wishlist', $wishlist);

    }

    public function addToWishListAfterLogin(): void
    {
        $user = \auth()->user();

        if (session()->has('wishlist')) {
            $wishlist = session('wishlist');
            foreach ($wishlist as $productID => $item) {
                $product = product::findOrFail($productID);
                $order = $user->orders()->Status('WISHLIST')->firstOrCreate(['user_id' => $user->id]);
                $items = OrderItem::updateOrInsert([
                    'order_id' => $order->id, 'product_id' => $product->id
                ], [
                    'quantity' => 1,  // Increment quantity
                    'unit_price' => $product->price,
                ]);
            }
            session()->forget('wishlist');
        }
    }
//  End  WishList //


}
