<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Irish Safety Training - Online Manual Handling Course</title>
    <link rel = "icon" href ="{{asset('images/logo/flavicon.png')}}" type = "image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/admin/navigationMain.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin/adminMain.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin/adminProfile.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin/homePageAdmin.css")}}">
    <link rel="stylesheet" href="{{asset("css/front/landing.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin/consulting.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin/employeeRegister.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin/dashboard.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin/basket.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin/orders.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin/course.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin/checkout.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin/package.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin/share.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin/adminProduct.css")}}">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
<div class="hamButtonAdmin" id="hamButtonAdmin">
    <img src="{{asset("images/logo/hamMenu.png")}}" alt="">
</div>
@include("adminIncludes/mobileNavAdmin")
@if (session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="error-message">
        <strong>{{ $message }}</strong>
    </div>
@endif
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="error-message">{{$error}}</div>
    @endforeach
@endif
@include('adminIncludes/navigationAdminMain')
@yield('adminContent')

<script>
window.replainSettings = { id: 'c80878c4-2fae-43e0-9c25-b83f75ab8a61' };
(function(u){var s=document.createElement('script');s.async=true;s.src=u;
var x=document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);
})('https://widget.replain.cc/dist/client.js');
</script>
{{--<script src="{{asset('js/language.js')}}"></script>--}}
<script src="{{asset('js/dropAdminMenu.js')}}"></script>
<script src="{{asset('js/errors.js')}}"></script>
<script src="{{asset('js/hideAdminNav.js')}}"></script>
<script src="{{asset('js/navAdmin.js')}}"></script>
</body>
</html>
