@extends('layout.app')

@section('content')
<style>
    * {
        font-family: "Muli", Helvetica, sans-serif;

    }



    .card p,
    .card .card-body label {
        margin-top: 20px !important;
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

    .btn-primary:hover,
    .btn-primary:focus {
        background: #00706d;
        border: 1px solid #00706d;
    }

    .custom-footer {
        background: #f5f5f5;
        margin: -20px !important;
        height: 70px;
        padding-top: 2%
    }

</style>

<div class="login-container col-11 mx-auto order-0">
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
                        <br><br>
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
