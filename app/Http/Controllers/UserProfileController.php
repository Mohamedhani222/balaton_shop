<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Country;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function create()
    {
        $countries = Country::all();
        return view('user-profile.create', compact('countries'));
    }

    public function store(CheckoutRequest $request)
    {
        if (Auth::user()->address) {
            flash('You Already Complete Your info', 'error');
            return redirect()->route('index');
        }
        $data = array_merge($request->validated(), [
            'user_id' => auth()->user()->id
        ]);
        ShippingAddress::create($data);
        flash('created successfully');
        return redirect()->back();
    }

}
