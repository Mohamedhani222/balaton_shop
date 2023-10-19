<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\product;
use App\Services\SessionCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public $sessionCart;

    public function __construct(SessionCart $sessionCart)
    {
        $this->sessionCart = $sessionCart;
    }

    public function index()
    {
        if (\auth()->check()) {
            $user = Auth::user();

            $cart = $user->orders()->Status('IN_CART')->first();

            $cartItems = $cart ? $cart->products()->get() : [];

            return view('website.card.index', compact('cart', 'cartItems'));
        }
        $cartItems = session('cart');
        return view('website.card.index', compact('cartItems'));

//        return \session('cart');
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $product = Product::findorFail($request->product_id);
            $qty = $request->qty;
            if (!auth()->check()) {
                $this->sessionCart->add_to_cart($request, $product, $qty);
            } else {
                $user = Auth::user();
                $order = $user->orders()->Status('IN_CART')->firstOrCreate((['user_id' => $user->id]));
                $order->total_price += $product->price * $qty;
                $order->save();
                OrderItem::updateOrInsert(
                    ['order_id' => $order->id, 'product_id' => $product->id],
                    [
                        'quantity' => DB::raw('quantity + ' . $qty),  // Increment quantity
                        'unit_price' => $product->price,
                        'total_price' => DB::raw('total_price + ' . ($qty * $product->price)), // Update total_price
                    ]
                );
            }
            DB::commit();
            return response()->json('added successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }

    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            if (!auth()->check()) {
                $this->sessionCart->destroy($request->item_id);
            } else {
                $user = Auth::user();
                $order_item = OrderItem::where([
                    'id' => $request->item_id,
                    'order_id' => $user->orders()->Status('IN_CART')->pluck('id'),
                ])->firstorFail();

                $order = $user->orders()->Status('IN_CART')->first();
                $order->total_price -= $order_item->unit_price * $order_item->quantity;
                $order->save();
                $order_item->delete();

                DB::commit();

            }
            flash('removed from cart successfully');
            return redirect()->route('cart.index');

        } catch (\Exception $e) {
            DB::rollBack();
            flash($e->getMessage(), 'error');
            return redirect()->route('cart.index');
        }

    }


}
