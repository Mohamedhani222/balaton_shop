@extends('website.layouts.master')
@section('title')
    login
@endsection
@section('content')
    <div class="container">
        <div class="box-login my-4">
            <div class="b-box-login">
                <div class="header-login">

                    <a href="/"><i class="bi bi-arrow-left"></i></a>
                    <div>
                        {{ __('login') }}
                    </div>
                    <div class="px-3"></div>
                </div>
                <div class="container-login py-4">
                    <form method="POST" action="{{ route('login') }}">
                        <div class="form-login">
                            @csrf
                            <div class="input-group mb-3">
                                <input placeholder="EMAIL" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
        

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group mb-1">
                                <input placeholder="PASSWORD" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group mb-3" >
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember" >
                                        Remember login
                                    </label>
                                </div>
                            </div>
                            <div class="input-group mb-3">

                                <button type="submit" class="btn btn-balaton w-100"  >
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="text-center">

                                <span>
                                    
                                    Don't have an account? <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                </span>
                                
                                <br>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    Forgot your password
                                </a>
                                @endif
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

