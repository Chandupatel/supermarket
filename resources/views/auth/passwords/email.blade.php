@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="sign-form">
                <div class="sign-inner">
                    <div class="sign-logo" id="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ $gs->company_logo }}" alt="">
                        </a>
                        <a href="{{ route('home') }}">
                            <img class="logo-inverse" src="{{ $gs->company_logo }}" alt="">
                        </a>
                    </div>
                    <div class="form-dt">
                        <div class="form-inpts checout-address-step">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-title">
                                    <h6>Reset Password</h6>
                                </div>
                                <div class="form-group pos_rel">
                                    <input id="email" name="email" type="email" placeholder="Enter Email Id"
                                        class="form-control lgn_input @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <i class="uil uil-envelope lgn_icon"></i>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button class="login-btn hover-btn" type="submit">Sign In Now</button>
                            </form>
                        </div>
                        <div class="password-forgor">
                            <a href="{{ route('login') }}">Login</a>
                        </div>
                        <div class="signup-link"></div>
                    </div>
                </div>
            </div>
            <div class="copyright-text text-center mt-3">
                <i class="uil uil-copyright"></i>Copyright {{ date('Y') }} <b>{{ env('APP_NAME') }}</b> . All rights
                reserved
            </div>
        </div>
    </div>
@endsection
