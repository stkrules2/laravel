@extends('layout.app')

@section('content')

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
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapse1">Step 1: Checkout </i></a>
                        </h4>
                    </div>

                </div>

            </div>
            <div>
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapse2" id="collapse2">Step 2:
                                Billing & Delivery
                                Details <i class="fa fa-caret-down"></i></a>
                        </h4>
                    </div>

                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">

                        <div class="radio">
                            <label>
                                <input type="radio" name="payment_address" id="existing-payment-address-radio"
                                    value="existing" checked="checked">
                                Choose a delivery and bill address</label>
                        </div>
                        <div id="payment-existing">

                            <select name="existing_address_id" class="form-control">
                                @if(isset($addresses))
                                @foreach($addresses as $address)
                                <option value="{{$address->id}}">
                                    {{$address->fullname}},&nbsp;{{$address->address}},&nbsp;{{$address->postcode}}
                                </option>
                                @endforeach
                                @endif
                            </select>

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
                <div class="panel">
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
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapse5">Step 5: Confirm Order <i
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