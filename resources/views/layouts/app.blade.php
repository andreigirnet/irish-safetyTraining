<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Skillcourses.ie | Online Courses</title>
    <meta property="og:image" content="{{asset('images/logo/metaImage.jpg')}}" />
    <link rel = "icon" href ="{{asset('images/logo/flavicon.png')}}" type = "image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/front/login.css")}}">
    <link rel="stylesheet" href="{{asset("css/front/register.css")}}">
</head>
<body>
        <main>
            @yield('content')
        </main>
</body>
</html>
