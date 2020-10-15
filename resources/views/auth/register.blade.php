@extends('layout.app')

@section('content')
<style>
    * {
        font-family: "Muli", Helvetica, sans-serif;

    }

    .card .card-body .form-control {
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

    h2 {
        background: none;
        border-bottom: none;
        font: 700 20px/25px "Muli", Helvetica, sans-serif;
        font-size: 18px;
        color: #333333;

    }

    .btn-primary {
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


    .form-control:hover,
    .form-control:active,
    button:active,
    button:focus,
    button:hover,
    .form-control:focus,
    label:focus {
        outline: 0px !important;
        -webkit-appearance: none !important;
        box-shadow: none !important;
    }

    .card p,
    .card .card-body label {
        margin-top: 10px;
        margin-bottom: 0;
        font-size: 13px;
        color: #666;
        font-weight: 400;
        letter-spacing: 1px;
    }

    .card form p {
        color: black;
        font-size: 16px;
    }

    .card .card-body .form-check input {
        margin-top: 12px;
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

    .btn-primary:hover {
        background: #00706d;
        border: 1px solid #00706d;
    }

    .custom-footer {
        background: #f5f5f5;
        margin: -20px;
        height: 70px;
        padding-top: 2%
    }

</style>

<div class="col-11 mx-auto order-0">
    <div class="header-content-title">
        <div class="page-title-wrapper">
            <div class="col-12">
                <h2 class="page-title">{{ __('Register') }}</h2>

            </div>

        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                <div class="card-body">
                    <p>If you already have an account with us, please login at the login page.</p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <p>Account Details</p>
                        <hr>
                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name"
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required
                                    autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <br>
                        <div class="form-group custom-footer row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
