<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- App favicon -->
    <link href="{{ $gs->company_favicon }}" rel="icon" type="image/jpg">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href='{{ asset('front/vendor/unicons-2.0.1/css/unicons.css') }}' rel='stylesheet'>
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/night-mode.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/OwlCarousel/assets/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/semantic/semantic.min.css') }}">
    <link href="{{ asset('sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    {{-- Angular Css --}}
    <link rel="stylesheet" href="{{ asset('angular/ngDialog-theme-default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('angular/ngDialog.min.css') }}">
    <link rel="stylesheet" href="{{ asset('angular/toster/toaster.css') }}">
</head>

<body ng-app="EcommerceApp">

    @include('layouts.front.category_model')
    @include('layouts.front.search_model')
    @include('layouts.front.cart')
    {{-- Start Header --}}
    @include('layouts.front.header')
    {{-- End Header --}}
    <div class="wrapper">
        @yield('content')
    </div>
    {{-- Start Footer --}}
    @include('layouts.front.footer')
    {{-- End Footer --}}
    <script data-cfasync="false" src="{{ asset('front/js/email-decode.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/vendor/OwlCarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('front/vendor/semantic/semantic.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('front/js/custom.js') }}"></script>
    <script src="{{ asset('front/js/offset_overlay.js') }}"></script>
    <script src="{{ asset('front/js/night-mode.js') }}"></script>

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
