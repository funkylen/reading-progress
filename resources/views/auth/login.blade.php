@extends('layouts.auth')

@section('form')
    <form class="p-4 p-md-5 border rounded-3 bg-light"
          data-bitwarden-watching="1" method="POST"
          action="{{ route('login') }}">
        @csrf
        <div class="form-floating mb-3">
            <input value="{{ old('email') }}" name="email" type="email"
                   class="form-control @error('password') is-invalid @enderror" id="email"
                   placeholder="name@example.com">
            <label for="email">{{__('Email address')}}</label>

            @error('email')
            <span class="invalid-feedback" role="alert">§
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input name="password" type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   id="password" placeholder="Password">
            <label for="password">{{__('Password')}}</label>

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> {{ __('Remember me') }}
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">{{__('Log in')}}</button>

        <small class="text-muted d-block">
            <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
        </small>

        <hr class="my-4">

        <div class="d-flex justify-content-center">
            <a href="{{ route('auth.google.redirect') }}" class="fab fa-google"></a>
        </div>
    </form>
@endsection

@section('bottom-content')
    <div class="container col-xl-10 col-xxl-8 px-4">
        <div class="row g-lg-5">
            <div class="col-lg-7">
            </div>

            <div
                class="col-md-10 mx-auto col-lg-5"
                x-init="setTimeout(() => show = true)"
                x-show="show"
                x-cloak
                x-transition.duration.750ms
                x-data="{ show: false }">

                <div class="bg-light border rounded-3 p-4 p-md-5">
                    <a href="{{ route('register') }}" class="btn btn-success btn-lg w-100 mb-3">Зарегистрироваться</a>
                    <small class="text-muted">После регистрации вам станут доступны все возможности Reading Progress.</small>
                </div>

            </div>

        </div>
    </div>
@endsection

