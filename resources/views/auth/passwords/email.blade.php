@extends('layouts.app')

@section('content')
<div class="loginContainer">
    <div class="loginFormWrap">
        <img class="logoMain" src="{{asset("images/logo/logoWhite.png")}}" alt="">
        <h1 class="loginTitle">Reset Password</h1>
        <div class="registerLink"><a href="{{route("login")}}">Go back to login page</a></div>
        <form method="POST" class="loginForm" action="{{ route('password.email') }}">
            @csrf
            <input id="email" type="email" placeholder="Email to send you paswword reset link" class="inputLogin @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @if (session('status'))
                <div class="alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <button type="submit" class="loginRegisterButton">
                {{ __('Send Password Reset Link') }}
            </button>
        </form>
    </div>
</div>
@endsection
