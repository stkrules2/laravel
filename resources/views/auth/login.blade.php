@extends('layout.app')

@section('content')
<style>
    * {
        font-family: "Muli", Helvetica, sans-serif;

    }

</style>
<div class="col-11 login-container  mx-auto order-0">
    <div class="header-content-title ">
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
                        keep track of the orders you have previously made.</p> <br><br>
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
