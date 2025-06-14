@extends('layouts.app')

@section('content')
<div class="container">
    <div class="login-container">
        <div class="login-box">
            <h2 class="text-center" style="color: #CB71A0;">{{ __('Login') }}</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn-pink">{{ __('Login') }}</button>
                </div>

                @if (Route::has('password.request'))
                    <div class="text-center mt-2">
                        <a href="{{ route('password.request') }}" class="btn btn-link">{{ __('Forgot Your Password?') }}</a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection