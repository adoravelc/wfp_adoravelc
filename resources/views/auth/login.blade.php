@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-box">
        <h1>Login</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn-custom">Login</button>
            </div>
        </form>

        <!-- Register link -->
        <p class="text-center">
            Don't have an account? <a href="{{ route('register') }}">Register here</a>
        </p>
    </div>
</div>
@endsection
