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
            <span class="invalid-feedback" role="alert">
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
        <div class="d-flex justify-content-between">

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me">
                    <small>{{ __('Remember me') }}</small>
                </label>
            </div>

            <small class="d-block mb-3">
                <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
            </small>
        </div>
        <button class="w-100 btn btn-lg btn-primary mb-4" type="submit">{{__('Log in')}}</button>


        <div class="d-flex justify-content-center">
            <a href="{{ route('auth.google.redirect') }}" class="fab fa-google"></a>
        </div>

        <hr class="my-4">

        <div class="text-muted d-block text-center">
            <a href="{{ route('register') }}">{{ __('Register') }}</a>
        </div>
    </form>
@endsection


