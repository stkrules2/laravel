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
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapse1">step 1: Checkout <i
                                    class="fa fa-caret-down"></i></a></h4>
                    </div>

                </div>

            </div>
            <div>
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapse2">Step 2: Billing Details <i
                                    class="fa fa-caret-down"></i></a>
                        </h4>
                    </div>

                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="payment_address" value="existing" checked="checked">
                                    I want to use an existing address</label>
                            </div>
                            <div id="payment-existing">
                                <select name="address_id" class="form-control">
                                    <option value="5" selected="selected">Sulman Azhar, H#144, Alflah-town, Bedian road
                                        Lahore cantt, Lahore, Punjab, Pakistan</option>
                                </select>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="payment_address" value="new">
                                    I want to use a new address</label>
                            </div>
                            <br>
                            <div id="payment-new" style="display: none;">
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-payment-firstname">First
                                        Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="firstname" value="" placeholder="First Name"
                                            id="input-payment-firstname" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-payment-lastname">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="lastname" value="" placeholder="Last Name"
                                            id="input-payment-lastname" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-payment-company">Company</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="company" value="" placeholder="Company"
                                            id="input-payment-company" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-payment-address-1">Address
                                        1</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="address_1" value="" placeholder="Address 1"
                                            id="input-payment-address-1" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-payment-address-2">Address
                                        2</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="address_2" value="" placeholder="Address 2"
                                            id="input-payment-address-2" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-payment-postcode">Post Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="postcode" value="" placeholder="Post Code"
                                            id="input-payment-postcode" class="form-control">
                                    </div>
                                </div>


                            </div>
                            <div class="buttons clearfix">
                                <div class="pull-right">
                                    <input type="button" value="Continue" id="button-payment-address"
                                        data-loading-text="Loading..." class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div>
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapse3">Step 3: Delivery Details <i
                                    class="fa fa-caret-down"></i>
                            </a></h4>
                    </div>

                </div>
                <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="shipping_address" value="existing" checked="checked">
                                    I want to use an existing address</label>
                            </div>
                            <div id="shipping-existing">
                                <select name="address_id" class="form-control">
                                    <option value="5" selected="selected">Sulman Azhar, H#144, Alflah-town, Bedian road
                                        Lahore cantt, Lahore, Punjab, Pakistan</option>
                                </select>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="shipping_address" value="new">
                                    I want to use a new address</label>
                            </div>
                            <br>
                            <div id="shipping-new" style="display: none;">
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-shipping-firstname">First
                                        Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="firstname" value="" placeholder="First Name"
                                            id="input-shipping-firstname" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-shipping-lastname">Last
                                        Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="lastname" value="" placeholder="Last Name"
                                            id="input-shipping-lastname" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-shipping-company">Company</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="company" value="" placeholder="Company"
                                            id="input-shipping-company" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-shipping-address-1">Address
                                        1</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="address_1" value="" placeholder="Address 1"
                                            id="input-shipping-address-1" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-shipping-address-2">Address
                                        2</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="address_2" value="" placeholder="Address 2"
                                            id="input-shipping-address-2" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-shipping-city">City</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="city" value="" placeholder="City"
                                            id="input-shipping-city" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-shipping-postcode">Post
                                        Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="postcode" value="54810" placeholder="Post Code"
                                            id="input-shipping-postcode" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="buttons clearfix">
                                <div class="pull-right">
                                    <input type="button" value="Continue" id="button-shipping-address"
                                        data-loading-text="Loading..." class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div>
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapse4">Step 4: Payment Method <i
                                    class="fa fa-caret-down"></i></a>
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