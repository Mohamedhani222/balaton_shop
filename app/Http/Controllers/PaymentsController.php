<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function create_payment($user, $order)
    {
        Payments::create([
            'user_id' => $user->id,
            'order_id' => $order->id,
            'payment_method' => $order->payment_method,
            'amount' => $order->total_price,
        ]);

    }
}
