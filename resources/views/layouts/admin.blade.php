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
    <link href="{{ $gs->company_favicon }}" rel="icon" type="image/jpg">
    <!-- App css -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <link href="{{ asset('sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('bootstrap4-toggle/bootstrap4-toggle.min.css') }}" rel="stylesheet">


    {{-- Angular Css --}}
    <link rel="stylesheet" href="{{ asset('angular/ngDialog-theme-default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('angular/ngDialog.min.css') }}">
    <link rel="stylesheet" href="{{ asset('angular/toster/toaster.css') }}">
</head>

<body ng-app="EcommerceApp">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        @include('layouts/admin/header')
        <!-- end Topbar -->
        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts/admin/sidebar')
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start Page Content here -->
            @yield('content')
            <!-- end content -->
            <!-- Footer Start -->
            @include('layouts/admin/footer')
            <!-- end Footer -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    <!-- end page -->
    <!-- Vendor js -->
    <script src="{{ asset('admin/js/vendor.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('admin/js/app.min.js') }}"></script>
    <script src="{{ asset('bootstrap4-toggle/bootstrap4-toggle.min.js') }}"></script>
    @include('layouts/notification')

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.row-delete-button', function(event) {
                var delete_url = $(this).attr('delete-url');
                event.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: "Are You Sure You Want To Delete This",
                    showCancelButton: true,
                    confirmButtonColor: '#ff0a36',
                    confirmButtonText: `Yes, delete it!`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: delete_url,
                            type: "delete",
                            cache: false,
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                if (data.status == true) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: data.message,
                                    }).then((value) => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: data.message,
                                    });
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                Swal.fire({
                                    icon: 'error',
                                    title: errorThrown,
                                });
                            }
                        });
                    }
                });
            });
        });

    </script>
    
    {{-- Angular Scripts --}}
    <script src="{{ asset('angular/angular.min.js') }}"></script>
    <script src="{{ asset('angular/angular-animate.min.js') }}"></script>
    <script src="{{ asset('angular/ngDialog.min.js') }}"></script>
    <script src="{{ asset('angular/toster/toaster.js') }}"></script>
    {{-- Angular App Scripts --}}
    <script src="{{ asset('angular/app/app.js') }}"></script>
    @yield('scripts')
</body>

</html>
