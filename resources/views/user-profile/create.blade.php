@extends('website.layouts.master')
@section('title')
    Complete information
@endsection

@section('content')
    <div class="container">
        <form class="mt-3" method="post" action="{{route('submit-info')}}">
            @csrf
            <h3 class="py-3">Complete your info</h3>
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


                <div class="col-6 ship-input">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control ship-input" name="address1"
                           placeholder="1234 Main St"
                           required>
                </div>

                <div class="col-6 ship-input">
                    <label for="address2" class="form-label">Address2</label>
                    <input type="text" class="form-control ship-input" name="address2"
                           placeholder="Address 2"
                           required>
                </div>

                <div class="col-6 ship-input">
                    <label for="phone" class="form-label">Phone </label>
                    <input type="number" class="form-control ship-input" name="phone"
                           placeholder="phone number">
                </div>
                <div class="col-6 ship-input">
                    <label for="pincode" class="form-label">Zip </label>
                    <input type="number" class="form-control ship-input" name="pincode" placeholder="Zip">
                </div>

                <div class="col-6 ship-input">
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
            <button class="btn btn-success my-3" type="submit">Save</button>
        </form>
    </div>

@endsection
