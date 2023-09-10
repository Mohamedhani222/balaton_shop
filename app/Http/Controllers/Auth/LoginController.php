<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    use AuthenticatesUsers;


//    protected $redirectTo = RouteServiceProvider::HOME;

    public function authenticated()
    {
        if (Auth::user()->is_admin == 1) {

            return redirect()->route('index') ->with('success','login successfully');

        }
        if (Auth::user()->is_admin == 0) {

            return redirect()->route('index') ->with('success','login successfully');

        }
    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
