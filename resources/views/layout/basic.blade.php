<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 8/06/2016
 * Time: 9:15 PM
 */
?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    {{-- links start from here --}}
    <link rel="stylesheet" href="{{asset('assets/package/bootstrap-3.3.6-dist/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    @yield('link')
</head>
<body>

    <div class="container">
        @yield('content')
    </div>

    {{-- scripts start from here --}}
    <script src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assets/package/bootstrap-3.3.6-dist/js/bootstrap.min.js')}}"></script>
    @yield('script')
</body>
</html>