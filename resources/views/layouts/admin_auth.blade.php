<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   <!-- App favicon -->
   <link href="{{$gs->company_favicon}}" rel="icon" type="image/jpg">
    <!-- App css -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{asset('admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/app.min.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />
</head>
<body class="authentication-bg  authentication-bg-pattern d-flex align-items-center pb-0 vh-100" style="background-color: #64c5b1!important">
@yield('content')
<!-- end page -->
<!-- Vendor js -->
<script src="{{asset('admin/js/vendor.min.js')}}"></script>
<!-- App js -->
<script src="{{asset('admin/js/app.min.js')}}"></script>
@yield('scripts')
</body>
</html>
