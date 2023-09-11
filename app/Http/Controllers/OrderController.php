<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('show-all-orders')) {
            abort(403);
        }
        $orders = Order::where('status','!=','IN_CART')->get();
        return view('admin.orders.order', compact('orders'));

    }


    public function make_order_paid($id)
    {
        if (!Gate::allows('show-all-orders')) {
            abort(403);
        }
        DB::beginTransaction();
        try {
            $order = Order::findorFail($id);
            $order->is_paid = 1;
            $order->paid_at = now();
            $order->status = 'SUCCESS';
            $order->delivery_status = 'DELIVERED';
            $order->save();
            $order->order_payment->update(['status' => 'paid']);
            $order->order_payment->save();
            flash('done');
            DB::commit();
            return back();

        } catch (\Exception $e) {
            DB::rollBack();
            flash($e->getMessage(), 'error');
            return back();
        }
    }


    public function show($id)
    {
        if (!Gate::allows('show-all-orders')) {
            abort(403);
        }
        $order = Order::findorFail($id);
        $order_info = Order::with('address.country')->findOrFail($id);
        $order_items = $order->products()->with('category')->get();

        return view('admin.orders.show', compact('order_info', 'order_items'));
    }

}
