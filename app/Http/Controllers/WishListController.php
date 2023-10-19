<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\product;
use App\Services\SessionCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishListController extends Controller
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

            $wishlist = $user->orders()->Status('WISHLIST')->first();

            $wishlistItems = $wishlist ? $wishlist->products()->get() : [];

            return view('website.wishlist.index', compact('wishlist', 'wishlistItems'));
        }
        $wishlistItems = session('wishlist');
        return view('website.wishlist.index', compact('wishlistItems'));
//        return \session('cart');
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $product = Product::findorFail($request->product_id);
            if (!auth()->check()) {
                $this->sessionCart->add_to_wishlist($request, $product);
                return session('wishlist');
            } else {
                $user = Auth::user();
                $order = $user->orders()->firstOrCreate((['user_id' => $user->id,'status'=> 'WISHLIST']));
                $order->total_price =null;
                $order->save();
                OrderItem::updateOrInsert(
                    ['order_id' => $order->id, 'product_id' => $product->id],
                    [
                        'quantity' => 1,  // Increment quantity
                        'unit_price' => $product->price,
                    ]
                );
            }
            DB::commit();
            return $order;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }

    }

    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            if (!auth()->check()) {
                $this->sessionCart->destroy($id);
            } else {
                $user = Auth::user();

                $order_item = OrderItem::where([
                    'id' => $id,
                    'order_id' => $user->orders()->Status('WISHLIST')->pluck('id'),
                ])->firstorFail();
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
