@extends('layout.app')

@section('content')
<style>
    label {
        font-size: 13px !important;
    }

    input,
    select {
        height: 37px !important;
        font-size: 13px !important;
    }

    .fa-check-circle {
        color: #00cc00;
    }

    .btn {
        background: black;
        border-radius: 30px;
        border: none;
        font-size: 13px !important;
        height: 39px !important;

    }

    .btn:hover,
    .btn:focus,
    .btn:active {
        background: #00706d !important;
        box-shadow: none !important;


    }

    #existing-payment-address-radio {
        margin-top: -7px;
        margin-right: 10px;
    }

</style>
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
        <form>
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
                                        <select name="existing_address_id" id="existing_address_id"
                                            class="form-control">


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
                                                <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="optional-fullname"
                                                        value={{ Auth::user()->name }}>
                                                </div>
                                            </div>
                                            <div class="form-group col-10 mx-auto order-0 row">
                                                <label for="custom-address"
                                                    class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control"
                                                        id="optional-custom-address">
                                                </div>
                                            </div>
                                            <div class="form-group col-10 mx-auto order-0 row">
                                                <label for="code" class="col-sm-2 col-form-label">Postal Code</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="optional-code">
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
                    <div class="panel" style="pointer-events: none ">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a data-toggle="collapse" href="#collapse4" id="collapse4">Step 3:
                                    Payment Method <i class="fa fa-caret-down"></i></a>
                            </h4>
                        </div>

                    </div>
                    <div id="collapse4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <h4>Panel Body</h4>
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
        </form>
    </div>
</div>

@endsection
