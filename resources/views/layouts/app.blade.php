<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <title>KECAMATAN LEUWISADENG | {{ $title }}</title>
</head>
<body>
    @include('layouts.menu-helper')
    @include('layouts.menu')
    @yield('content')
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
    $(document).scroll(function(e) {
        if($(document).scrollTop() >= 130)  {
            $('.navbar-helper').css('height', '60px');
            $('.navbar-helper').css('overflow', 'visible');
        }else{
            $('.navbar-helper').css('height', '0');
            $('.navbar-helper').css('overflow', 'hidden');
        }
    });
</script>
@yield('scripts')
</body>
</html>