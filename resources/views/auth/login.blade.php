@extends('layouts.app')
@section('content')
<div class="loginContainer">
    <div class="loginFormWrap">
        <img class="logoMain" src="{{asset("images/logo/logoWhite.png")}}" alt="">
        <h1 class="loginTitle">System Login</h1>
        <div class="registerLink"><a href="{{route("register")}}">Don't Have an account? Register on this link</a></div>
        <form method="POST" class="loginForm" action="{{ route('login') }}">
            @csrf
            <input id="email" type="email"placeholder="email" class=" inputLogin @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input id="password" type="password" placeholder="password" class=" inputLogin @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="rememberMe">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <div class="rememberMeText">Remember me</div>
            </div>
            <button type="submit" class="loginRegisterButton">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="lostPassword">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>
    </div>
</div>

@endsection
