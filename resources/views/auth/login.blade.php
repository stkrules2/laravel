@extends('layout.app')

@section('content')
<style>
    * {
        font-family: "Muli", Helvetica, sans-serif;

    }

    .page-title-wrapper {
        position: relative;
        background: #f5f5f5 none repeat scroll 0 0;
        float: left;
        margin: 0 0 30px;
        padding: 12px 0;
        width: 100%;
    }


    .page-title {
        font-size: 18px;
    }

    .card {
        border-radius: 0 !important;
    }

    textarea:hover,
    .form-control:hover,
    textarea:active,
    .form-control:active,
    textarea:focus,
    textarea:active,
    textarea:focus,
    textarea:hover,
    #main-form select:active,
    #main-form select:focus,
    #main-form select:hover,
    .form-control:focus,
    label:focus {
        outline: 0px !important;
        -webkit-appearance: none !important;
        box-shadow: none !important;
    }

    .login-container .card .card-header {
        background: none;
        border-bottom: none;
        font: 700 20px/25px "Muli", Helvetica, sans-serif;
        margin-top: 10px;
        padding-bottom: 0;
        margin-bottom: 0;
    }

    .login-container .card .card-header h2 {
        background: none;
        border-bottom: none;
        font: 700 20px/25px "Muli", Helvetica, sans-serif;
        font-size: 18px;
        color: #333333;

    }

    .login-container .card .card-body .form-group {
        margin: 0 auto;
    }

    .login-container .card .card-header p,
    .login-container .card .card-body label {
        margin-top: 10px;
        margin-bottom: 0;
        font-size: 13px;
        color: #666;
        font-weight: 400;
        letter-spacing: 1px;
    }


    .login-container .card .card-body .form-control {
        font-size: 13px;
        line-height: 24px;
        margin: 0 auto;
        padding: 0 auto;
        letter-spacing: 1px;
        border-radius: 0 !important;
        background: #fff;
        color: #414141;
        border: 1px solid #e5e5e5;
        height: 40px;
    }

    .login-container .card .card-body .form-check input {
        margin-top: 12px;
    }

    .login-container .card .card-header .register-text,
    .login-container .card .card-body label {
        font-size: 13px;
    }

    .login-container .card-footer .bottom-form .btn-link {
        font-size: 13px;
    }

    .login-container .card-footer .bottom-form .btn-primary {
        font-size: 14px;
        font-weight: 400;
        line-height: 18px;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        float: right;
        background: #000;
        border-color: transparent;
        color: #fff;
        padding: 8px 15px;
        font: 500 14px/22px "Muli", Helvetica, sans-serif;
        text-transform: capitalize;
        display: inline-block;
        letter-spacing: 1px;
        border-radius: 25px;
        -moz-border-radius: 25px;
        -webkit-border-radius: 25px;
        -khtml-border-radius: 25px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
    }

    .bottom-form {
        height: 80px;
    }
    @media only screen and (max-width: 767px) {
        .login-footer .bottom-form {
            height: 80px;
        }
    }    
    



    .login-container .card-body {
        padding-top: 0;
    }

    .login-container .card-footer .bottom-form a {
        color: #00706d;

    }


    .card-footer .bottom-form .btn-primary:hover {
        background: #00706d;
    }

</style>
<div class="col-11 mx-auto order-0">
    <div class="header-content-title">
        <div class="page-title-wrapper">
            <div class="col-12">
                <h2 class="page-title">Login</h2>

            </div>

        </div>
    </div>

    <div class="row login-container justify-content-center">
        <div class="col-lg-6 col-md-12 col-sm-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h2>NEW CUSTOMER </h2>
                    <p class="register-head"><strong>Register</strong></p>
                    <p class="register-text">By creating an account you will be able to shop faster, be up to date on an
                        order's status, and
                        keep track of the orders you have previously made.</p> <br><br><br><br><br>
                </div>

                <div class="text-right card-footer">
                    <div class="bottom-form">
                        <a href="register" class="btn btn-primary">Continue</a></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h2>NEW CUSTOMER </h2>
                    <p class="register-head"><strong>I am a returning customer</strong></p>
                </div>


                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email"
                                class=" col-form-label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="password"
                                class="col-form-label text-md-right">{{ __('Password') }}</label>

                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="ml-auto order-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer login-footer">
                        <div class="bottom-form">
                            @if(Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>

</div>
</div>
@endsection
