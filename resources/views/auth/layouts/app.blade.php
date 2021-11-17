<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Bogorkab | Login</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
<!-- IonIcons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/app.css') }}">
{{-- dataTables --}}
<link rel="stylesheet" href="{{ asset('css/admin/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('jquery-ui/jquery-ui.css') }}">
</head>
<body class="hold-transition sidebar-mini">

    @yield('content')

<script src="{{ asset('js/admin/jquery.js') }}"></script>
<script src="{{ asset('jquery-ui/jquery-ui.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminLTE/dist/js/adminlte.js') }}"></script>

{{-- ckeditor --}}
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('adminLTE/plugins/chart.js/Chart.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminLTE/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('adminLTE/dist/js/pages/dashboard3.js') }}"></script>
<script src="{{ asset('js/admin/dataTables.min.js') }}"></script>
<script src="{{ asset('js/admin/dataTables.bootstrap4.js') }}"></script>
@yield('scripts')
</body>
</html>