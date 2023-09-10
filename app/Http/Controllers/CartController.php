<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $cart = $user->orders()->Status('IN_CART')->first();

        $cartItems = $cart ? $cart->products()->get() : [];

        return view('website.card.index', compact('cart', 'cartItems'));

    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = Auth::user();
            $product = Product::findorFail($request->product_id);
            $qty = $request->qty;
            // get user cart
            $order = $user->orders()->Status('IN_CART')->firstOrCreate((['user_id' => $user->id]));
            $order->total_price += $product->price * $qty;
            $order->save();

            // check if item exist in user cart and update if not create new one
            OrderItem::updateOrInsert(
                ['order_id' => $order->id, 'product_id' => $product->id],
                [
                    'quantity' => DB::raw('quantity + ' . $qty),  // Increment quantity
                    'unit_price' => $product->price,
                    'total_price' => DB::raw('total_price + ' . ($qty * $product->price)), // Update total_price
                ]
            );
            DB::commit();
            return response()->json('added successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error($e->getMessage());
            return redirect()->route('cart.index');
        }

    }

    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            $user = Auth::guard('sanctum')->user();

            $order_item = OrderItem::where([
                'id' => $id,
                'order_id' => $user->orders()->Status('IN_CART')->pluck('id'),
            ])->firstorFail();

            $order = $user->orders()->Status('IN_CART')->first();
            $order->total_price -= $order_item->unit_price * $order_item->quantity;
            $order->save();

            $order_item->delete();

            DB::commit();
            flash('removed from cart successfully');
            return redirect()->route('cart.index');

        } catch (\Exception $e) {
            DB::rollBack();
            flash($e->getMessage(), 'error');
            return redirect()->route('cart.index');
        }
    }


}
