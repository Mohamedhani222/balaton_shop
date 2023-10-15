@extends('website.layouts.master')
@section('title')
    Register
@endsection
@section('content')
    <div class="container">
        <div class="box-login my-4">
            <div class="b-box-login">
                <div class="header-login">
                    <a href="/"><i class="bi bi-arrow-left"></i></a>
                    <div>
                        {{ __('Register') }}
                    </div>
                    <div class="px-3"></div>
                </div>
                <div class="container-login py-4">
                    <form method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="row g-2">
                            <div class="col-6">
                                <label for="fname" class="form-label mx-2">{{ __('first name') }}</label>
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autofocus>
                                @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="lname" class="form-label mx-2">{{ __('last name') }}</label>
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autofocus>
                                @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label mx-2">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="phone" class="form-label mx-2">{{ __('phone') }}</label>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="country" class="form-label mx-2">{{ __('country') }}</label>
<select id="country_id" type="text" class="form-control @error('country_id') is-invalid @enderror" name="country_id" value="{{ old('country_id') }}" required autofocus>
    @foreach(\App\Models\Country::all() as $country)
        <option value="{{$country->id}}">{{{$country->name}}}</option>

    @endforeach
</select>
                                @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="city" class="form-label mx-2">{{ __('city') }}</label>
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autofocus>

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="pincode" class="form-label mx-2">{{ __('pincode') }}</label>
                                <input id="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="{{ old('pincode') }}" autofocus>

                                @error('pincode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="address1" class="form-label mx-2">{{ __('address') }}</label>
                                <input id="address1" type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" value="{{ old('address1') }}" required autofocus>

                                @error('address1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="address2" class="form-label mx-2">{{ __('address 2') }}</label>
                                <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2') }}" autofocus>

                            </div>

                            <div class="col-md-6">
                                <label for="password" class="form-label mx-2">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password-confirm" class="form-label mx-2">{{ __('re-Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-balaton w-100 mt-4">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <div class="col-12">
                                <div class="text-center">
                                    <span>
                                        I have an account? <a href="{{ route('login') }}">{{ __('login') }}</a>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
