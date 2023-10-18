<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\product;
use App\Providers\RouteServiceProvider;
use App\Services\SessionCart;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{

    use AuthenticatesUsers;


//    protected $redirectTo = RouteServiceProvider::HOME;
    public
    function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated()
    {
        (new SessionCart())->addToCartAfterLogin();
        return redirect()->route('index')->with('success', 'login successfully');


    }
}
