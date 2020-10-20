@extends('layout.app')

@section('content')
<style>
    .checkout-container label {
        font-size: 13px !important;
    }

    .checkout-container .form-control,
    .checkout-container select {
        height: 37px !important;
        font-size: 13px !important;
    }

    .checkout-container .fa-check-circle {
        color: #00cc00;
    }

    .checkout-container .btn {
        background: black;
        border-radius: 30px;
        border: none;
        color: white;
        font-size: 13px !important;
        height: 39px !important;

    }

    .checkout-container .btn:hover,
    .checkout-container .btn:focus,
    .checkout-container .btn:active {
        background: #00706d !important;
        box-shadow: none !important;
        color: white !important;


    }

    #existing-payment-address-radio {
        margin-top: 3px;
        margin-right: 10px;
    }

    #exampleRadios1,
    #exampleRadios2 {
        margin-top: 7px;
        margin-right: 20px;
    }

</style>
<script src="https://js.stripe.com/v2/"></script>
<div class="checkout-container">
    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <p>Checkout</p>
            <span>
                <li class="breadcrumb-item"><a href="/home"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item" aria-current="/page"><a href="/setting">Settings</a></li>
                <li class="breadcrumb-item" aria-current="/page"><a href="/mycart">Cart</a></li>
                <li class="breadcrumb-item active" aria-current="/page">Checkout</li>
            </span>
        </ol>
    </nav>
    <div class="container">

        <div class="panel-group">
            <div>
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapse1">Step 1: Checkout <i
                                    class="fa fa-check-circle"></i></a>
                        </h4>
                    </div>

                </div>

            </div>
            <div>
                <div class="panel panel2">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapse2">Step 2:
                                Billing & Delivery
                                Details <i class="fa fa-caret-down"></i></a>
                        </h4>
                    </div>

                </div>
                <div id="collapse2" class="panel-collapse collapse show">
                    <div class="panel-body">
                        <div id="payment-existing">
                            @if(isset($addresses))
                                @if($addresses != '[]')
                                    <select name="existing_address_id" id="existing_address_id" class="form-control">


                                        @foreach($addresses as $address)
                                            <option value="{{ $address->id }}">
                                                {{ $address->fullname }},&nbsp;{{ $address->address }},&nbsp;{{ $address->postcode }}
                                            </option>
                                        @endforeach


                                    </select>
                                    <div class="row col-12 radio">
                                        <input type="checkbox" name="payment_address"
                                            id="existing-payment-address-radio" value="existing">
                                        <label for="existing-payment-address-radio"> Choose a different delivery and
                                            billing address</label>


                                    </div>
                                    <div class="alternate" style="display:none">
                                        <div class="form-group col-10 mx-auto order-0 row">
                                            <label for="optional-fullname" class="col-sm-2 col-form-label">Full Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="optional-fullname" class="form-control" id="optional-fullname"
                                                    value={{ Auth::user()->name }}>
                                            </div>
                                        </div>
                                        <div class="form-group col-10 mx-auto order-0 row">
                                            <label for="optional-number" class="col-sm-2 col-form-label">Mobile Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="optional-number" class="form-control" id="optional-number"
                                                    value={{ Auth::user()->mobile_number }}>
                                            </div>
                                        </div>
                                        <div class="form-group col-10 mx-auto order-0 row">
                                            <label for="optional-custom-address" class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="optional-custom-address" class="form-control" id="optional-custom-address">
                                            </div>
                                        </div>
                                        <div class="form-group col-10 mx-auto order-0 row">
                                            <label for="optional-code" class="col-sm-2 col-form-label">Postal Code</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="optional-code" class="form-control" id="optional-code">
                                            </div>
                                        </div>
                                    </div>
                                @else

                                    <div class="form-group col-10 mx-auto order-0 row">
                                        <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="fullname"
                                                value={{ Auth::user()->name }}>
                                        </div>
                                    </div>
                                    <div class="form-group col-10 mx-auto order-0 row">
                                            <label for="number" class="col-sm-2 col-form-label">Mobile Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="number" class="form-control" id="number"
                                                    value={{ Auth::user()->mobile_number }}>
                                            </div>
                                        </div>
                                    <div class="form-group col-10 mx-auto order-0 row">
                                        <label for="custom-address" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="custom-address">
                                        </div>
                                    </div>
                                    <div class="form-group col-10 mx-auto order-0 row">
                                        <label for="code" class="col-sm-2 col-form-label">Postal Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="code">
                                        </div>
                                    </div>
                                @endif
                            @endif


                        </div>


                        <div class="buttons clearfix">
                            <div class="pull-right">
                                <input type="button" value="Continue" id="button-payment-address"
                                    data-loading-text="Loading..." class="btn btn-primary">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div>
                <div class="panel panel3" style="pointer-events: none ">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapse4" id="collapse4">Step 3:
                                Payment Method <i class="fa fa-caret-down"></i></a>
                        </h4>
                    </div>

                </div>
                <div id="collapse4" class="collapse3 panel-collapse collapse">
                    <div class="panel-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentRadios" id="exampleRadios1"
                                value="Cash on delivery" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Cash on Delivery
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentRadios" id="exampleRadios2"
                                value="Online Payment">
                            <label class="form-check-label" for="exampleRadios2">
                                Online Payment
                            </label> <br> <br>
                            <div style="display:none" class="payment-method">
                                <form accept-charset="UTF-8" action="/" class="require-validation"
                                    data-cc-on-file="false"
                                    data-stripe-publishable-key="pk_test_51HdgxrCXalV7Z0KR5XJhTmzdOuDfUTPrHrEe4uoYU75BuUwfT4XVP2pZCSX0JVnbh4KD0cneHfwLMeh46lNptqzc00QCEQGWNU"
                                    id="payment-form" method="post">

                                    {{ csrf_field() }}
                                    <div class='form-row'>
                                        <div class='col-12 form-group required'>
                                            <label class='control-label'>Name on Card</label> <input
                                                class='form-control' size='4' type='text'>
                                        </div>
                                    </div>
                                    <div class='form-row'>
                                        <div class='col-12 form-group card required' style="margin:0 5px">
                                            <label class='control-label'>Card Number</label> <input autocomplete='off'
                                                class='form-control card-number' size='20' type='text'>
                                        </div>
                                    </div><br>
                                    <div class='form-row'>
                                        <div class='col-4 form-group cvc required'>
                                            <label class='control-label'>CVC</label> <input autocomplete='off'
                                                class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                type='text'>
                                        </div>
                                        <div class='col-4 form-group expiration required'>
                                            <label class='control-label'>Expiration</label> <input
                                                class='form-control card-expiry-month' placeholder='MM' size='2'
                                                type='text'>
                                        </div>
                                        <div class='col-4 form-group expiration required'>
                                            <label class='control-label'> </label> <input
                                                class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                type='text'>
                                        </div>
                                    </div>
                                    <input type="hidden" class="price" name="price" value={{ $total }}>
                                    <input type="hidden" class="cart" name="cart" value={{ $cart->first()->id }}>
                                    <div class='form-row'>
                                        <div class='col-2'>
                                            <div class='form-control total btn btn-info text-center'>
                                                <span style=" margin: 0 auto; margin-top:5px;">Total:
                                                    <span class='amount'></span>{{ number_format($total , 2) }}
                                                    BD</span>
                                            </div>

                                        </div>
                                        <div class='col-2 ml-auto order-0 form-group'>
                                            <button class='form-control btn btn-primary submit-button'
                                                type='submit'>Pay</button>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <div class="col-md-12 error hide form-group">
                                            <div class="alert-danger alert"></div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="panel" style="pointer-events: none ">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapse5">Step 4: Confirm Order <i
                                    class="fa fa-caret-down"></i></a>
                        </h4>
                    </div>

                </div>
                <div id="collapse5" class="panel-collapse collapse">
                    <div class="panel-body">
                        <h4>Panel Body</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
