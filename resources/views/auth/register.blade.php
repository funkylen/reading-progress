@extends('layouts.auth')

@section('form')

    <form class="p-4 p-md-5 border rounded-3 bg-light" data-bitwarden-watching="1"
          method="POST"
          action="{{ route('register') }}"

          x-data="{ password: ''}">
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
            <input x-model="password" name="password" type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   id="password" placeholder="Password">
            <label for="password">{{__('Password')}}</label>

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div x-show="password.length > 0" x-transition.duration.750ms
             x-cloak
             class="form-floating mb-3">
            <input type="password" class="form-control" id="confirm-password" placeholder="Password"
                   name="password_confirmation">
            <label for="confirm-password">{{__('Confirm Password')}}</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary mb-2" type="submit">{{__('Register')}}</button>

        <div class="d-flex justify-content-center">
            <a href="{{ route('auth.google.redirect') }}" class="fab fa-google"></a>
        </div>

        <hr class="my-4">

        <small class="text-muted d-block text-center">
            <a href="{{ route('login') }}">{{ __('Log in') }}</a>
        </small>

    </form>

@endsection

