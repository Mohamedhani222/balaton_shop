<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashOnDelivery extends Controller
{
    public function pay($user,$order)
    {

        if (!$order) {
            throw new Exception('something went wrong please try again');
        }
        $order->status = 'PENDING';
        $order->delivery_status = 'PENDING';
        $order->payment_method = 'cash_on_delivery';
        $order->save();

    }
}
