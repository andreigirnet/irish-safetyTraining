@extends('layouts.app')

@section('content')
<div class="registerContainer">
    <div class="registerFormWrap">
        <img class="logoMain" src="{{asset("images/logo/logomain.png")}}" alt="">
        <h1 class="loginTitle">System Registration</h1>
        <div class="registerLink"><a href="{{route("login")}}">Have already an account? Login Here</a></div>
        <form method="POST" class="loginForm" action="{{ route('register') }}">
            @csrf

            <input id="name" type="text" placeholder="Full Name" class="inputLogin @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input id="email" type="email" placeholder="Email" class="inputLogin @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input type="text" class="inputLogin" name="phone" placeholder="Phone">

            <input id="password" type="password" placeholder="Password" class="inputLogin @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input id="password-confirm" placeholder="Password Confirm" type="password" class="inputLogin" name="password_confirmation" required autocomplete="new-password">
            <div class="alertRegister">
                <div class="alertRegisterTitle">Important Notice:</div>
                <div class="alertRegisterText">Please have a double check over your details and make sure that your full name and email address is entered correctly otherwise you won't receive any information from our system into your email ( your certificate will be printed out with the name on it as  you register on this page). If you register someone else, please use that candidate' email and full name. If you wish to proceed with your registration and your details are correct, please press on the "Register" button.</div>
            </div>
            <button type="submit" class="loginRegisterButton">
                Register
            </button>
        </form>
</div>
@endsection
