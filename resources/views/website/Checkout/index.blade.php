@extends('website.layouts.master')
@section('title')
    Checkout
@endsection

@section('content')
    <div class="container my-3">
        <main>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your cart</span>
                        <span class="badge bg-primary rounded-pill">{{$cart->products_count}}</span>
                    </h4>

                    <ul class="list-group mb-3">
                        @foreach($cartItems as $item)
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{$item->name}} ({{$item->pivot->quantity}})</h6>
                                    <small class="text-muted">{{$item->description}}</small>
                                </div>
                                <span class="text-muted">{{$item->pivot->total_price}}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (USD)</span>
                                <strong>{{$cart->total_price}}</strong>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-7 col-lg-8">
{{--                    @if ($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                        <h4 class="mb-3">Shipping address</h4>
                    <form class="" method="post" action="{{route('checkout.store')}}">
                        @csrf
                        @if(Auth::user()->address)
                            <div class="form-check mb-2">
                                <input type="checkbox" id="useAddressCheckbox" name="use_user_address"
                                       class="form-check-input">
                                <label class="form-check-label" for="credit">Use My Profile Address</label>
                            </div>

                        @endif

                        <div class="row g-3">
                            <div class="col-sm-6 ship-input">
                                <label for="firstName" class="form-label ">First name</label>
                                <input type="text" class="form-control ship-input" name="first_name" placeholder=""
                                       required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6 ship-input ">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control ship-input" name="last_name" placeholder=""
                                       required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>


                            <div class="col-12 ship-input">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control ship-input" name="address1"
                                       placeholder="1234 Main St"
                                       required>
                            </div>

                            <div class="col-12 ship-input">
                                <label for="address2" class="form-label">Address2</label>
                                <input type="text" class="form-control ship-input" name="address2"
                                       placeholder="Address 2"
                                       required>
                            </div>

                            <div class="col-12 ship-input">
                                <label for="phone" class="form-label">Phone </label>
                                <input type="number" class="form-control ship-input" name="phone"
                                       placeholder="phone number">
                            </div>
                            <div class="col-12 ship-input">
                                <label for="pincode" class="form-label">Zip </label>
                                <input type="number" class="form-control ship-input" name="pincode" placeholder="Zip">
                            </div>

                            <div class="col-12 ship-input">
                                <label for="delivery_notes" class="form-label">Delivery Notes </label>
                                <input type="text" class="form-control ship-input" name="delivery_notes"
                                       placeholder="delivery notes" required>
                            </div>

                            <div class="col-md-5 ship-input">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select ship-input" name="country_id" required>
                                    <option disabled>Choose...</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>


                        </div>

                        <hr class="my-4">

                        <h4 class="mb-3">Payment</h4>

                        <div class="my-3">
                            <div class="form-check">
                                <input id="cash_on_delivery" name="paymentMethod" type="radio" value="cash_on_delivery"
                                       class="form-check-input"
                                       checked required>
                                <label class="form-check-label" for="credit">Cash On Delivery</label>
                            </div>

                        </div>
                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script>
        var checkbox = document.getElementById('useAddressCheckbox');

        var shipInputs = document.querySelectorAll('.ship-input');

        checkbox.addEventListener('change', function () {
            if (checkbox.checked) {
                shipInputs.forEach(function (input) {
                    input.style.display = 'none';
                    input.disabled = true
                    input.required = false
                });
            } else {
                shipInputs.forEach(function (input) {
                    input.style.display = 'block';
                    input.disabled = false
                    input.required = false

                });
            }
        });
    </script>
@endsection
