<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Title --}}
    <title>Skillcourses.ie | Online Courses</title>
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow" rel="stylesheet">
    {{-- Css --}}
    <link rel = "icon" href ="{{asset('images/logo/flavicon.png')}}" type = "image/x-icon">
    <meta property="og:image" content="{{asset('images/logo/metaImage.jpg')}}" />
    <link rel="stylesheet" href="{{asset("css/main.css")}}">
    <link rel="stylesheet" href="{{asset("css/front/registerInclude.css")}}">
    <link rel="stylesheet" href="{{asset("css/front/footer.css")}}">
    <link rel="stylesheet" href="{{asset("css/front/brandSwiper.css")}}">
    <link rel="stylesheet" href="{{asset("css/front/landing.css")}}">
    <link rel="stylesheet" href="{{asset("css/front/products.css")}}">
    <link rel="stylesheet" href="{{asset("css/front/product.css")}}">
    <link rel="stylesheet" href="{{asset("css/front/teamTraining.css")}}">
    <link rel="stylesheet" href="{{asset("css/front/faq.css")}}">
    <link rel="stylesheet" href="{{asset("css/front/contact.css")}}">
    <link rel="stylesheet" href="{{asset("css/front/consulting.css")}}">
    <link rel="stylesheet" href="{{asset("css/front/login.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin/adminProduct.css")}}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body x-data="app()">
<script>
    window.replainSettings = { id: '7aeb66a8-f6a4-4c19-9722-78365866f35d' };
    (function(u){var s=document.createElement('script');s.async=true;s.src=u;
        var x=document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);
    })('https://widget.replain.cc/dist/client.js');
</script>
@include("frontIncludes/hamburger")
@include("frontIncludes/responsiveNav")
@include("frontIncludes/frontNav")
@include("frontIncludes/subNav")
@yield('content')
@include("frontIncludes/registerInclude")
@include("frontIncludes/footer")
@include("frontIncludes/brandSwiper")
<script src="{{asset("js/hamburgerAction.js")}}"></script>
<script src="{{asset("js/brandSwiper.js")}}"></script>
<script src="{{asset("js/accordion.js")}}"></script>
<script src="{{asset("js/review.js")}}"></script>
<script src="{{asset("js/mainScript.js")}}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
