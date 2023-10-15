<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\ShippingAddress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        try {
            $data = $request->validate(
                [
                    'name' => ['nullable', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]
            );
            $data['name'] = $request->fname . $request->lname;
            $user = User::create($data);
            auth::loginUsingId($user->id);
            return redirect('/')->with('success', 'created successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

    }


}

