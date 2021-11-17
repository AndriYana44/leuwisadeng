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
    <style>
        #button {
      display: flex;
      background-color: #1e7528;
      width: 50px;
      height: 50px;
      text-align: center;
      border-radius: 4px;
      position: fixed;
      bottom: 30px;
      right: 30px;
      transition: background-color .3s, 
        opacity .5s, visibility .5s;
      opacity: 0;
      visibility: hidden;
      z-index: 1000;
      justify-content: center;
      align-items: center;
      text-decoration: none;
      color: #FFF;
      font-size: 22px;
      transition: .3s;
    }
    #button:hover {
      cursor: pointer;
      background-color: #333;
      color: #FF9800;
      margin-bottom: 3px;
    }
    #button:active {
      background-color: #555;
    }
    #button.show {
      opacity: 1;
      visibility: visible;
    }
    </style>
    <a id="button">
        <i class="fa fa-angle-double-up"></i>
    </a>
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

    var btn = $('#button');

    $(window).scroll(function() {
    if ($(window).scrollTop() > 130) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
    });

    btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
    });
</script>
@include('layouts.footer')
@yield('scripts')
</body>
</html>