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

    function convertDate(date = `${new Date().getDate()}-${new Date().getMonth()+1}-${new Date().getFullYear()}`) {
        date = date.split('-');
        let month = date[1];
            if(month == 1)
                res = 'Januari';
            else if(month == 2)
                res = 'Februari';
            else if(month == 3)
                res = 'Maret';
            else if(month == 4)
                res = 'April';
            else if(month == 5)
                res = 'Mei';
            else if(month == 6)
                res = 'Juni';
            else if(month == 7)
                res = 'Juli';
            else if(month == 8)
                res = 'Agustus';
            else if(month == 9)
                res = 'September';
            else if(month == 10)
                res = 'Oktober';
            else if(month == 11)
                res = 'November';
            else 
                res = 'Desember';
        result = `${date[0]} ${res} ${date[2]}`;
        return result;
    }
</script>
@include('layouts.footer')
@yield('scripts')
</body>
</html>