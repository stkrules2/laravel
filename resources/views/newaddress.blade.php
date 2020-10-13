@extends('layout.app')

@section('content')

<div class="address-container">
    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <p>Add Address</p>
            <span>
                <li class="breadcrumb-item"><a href="/home"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item" aria-current="/page"><a href="/setting">Settings</a></li>
                <li class="breadcrumb-item" aria-current="/page"><a href="/address">Address</a></li>
                <li class="breadcrumb-item active" aria-current="/page">Add Address</li>
            </span>
        </ol>
    </nav>
    <div id="address" class="col-sm-12 Cwidth container" style="width: 100%;">

        <form method="post" enctype="multipart/form-data" id="new-address-form" class="form-horizontal">
            {{@csrf_field()}}
            <fieldset>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-fullname">Full Name </label>
                    <div class="col-sm-10">
                        <input type="text" name="fullname" placeholder="Full Name" id="input-fullname"
                            class="form-control">
                        <span class='name-error'></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-company-name">Company </label>
                    <div class="col-sm-10">
                        <input type="text" name="company-name" placeholder="Company Name (Optional)"
                            id="input-company-name" class="form-control">

                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-address">Address </label>
                    <div class="col-sm-10">
                        <input type="text" name="address" value="" placeholder="Address" id="input-address"
                            class="form-control">
                        <span class='address-error'></span>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-postcode">Post Code </label>
                    <div class="col-sm-10">
                        <input type="number" name="postcode" value="" placeholder="Post Code" id="input-postcode"
                            class="form-control">
                        <span class='post-error'></span>
                    </div>
                </div>



            </fieldset>
            <div class="buttons clearfix">
                <div class="pull-left"><a href="/address" class="btn btn-default">Back</a></div>
                <div class="pull-right">
                    <input type="submit" value="Continue" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection