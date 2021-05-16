@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="sign-form">
                <div class="sign-inner">
                    <div class="sign-logo" id="logo">
                        <a href="{{ route('home') }}"><img src="{{ $gs->company_logo }}" alt=""></a>
                        <a href="{{ route('home') }}"><img class="logo-inverse"
                                src="{{ $gs->company_logo }}" alt=""></a>
                    </div>
                    <div class="form-dt">
                        <div class="form-inpts checout-address-step">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-title">
                                    <h6>Sign In</h6>
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
                                <div class="form-group pos_rel">
                                    <input id="password" type="password" placeholder="Enter Password"
                                        class="form-control lgn_input @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">
                                    <i class="uil uil-padlock lgn_icon"></i>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group pos_rel">
                                    <input type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <button class="login-btn hover-btn" type="submit">Sign In Now</button>
                            </form>
                        </div>
                        <div class="password-forgor">
                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                        <div class="signup-link">
                            <p>Don't have an account? - <a href="{{ route('register') }}">Sign Up Now</a></p>
                        </div>
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
