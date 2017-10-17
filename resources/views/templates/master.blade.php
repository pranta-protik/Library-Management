<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/library.css')}}">
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
</head>

<body>
<!-- Navigation -->
@include('templates.navbar')

<div style="background-color:whitesmoke">
@yield('body')
</div>

@include('templates.footer')

<script src="{{asset('js/app.js')}}"></script>
@yield('script')

</body>

</html>
