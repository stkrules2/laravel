@extends('layout.app')

@section('content')
<style>

.account-container input{
    font-size:13px;
}
</style>
<div class="account-container">
    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <p>Account</p>
            <span>
                <li class="breadcrumb-item"><a href="/home"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item" aria-current="/page"><a href="/setting">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="/page">Account</li>
            </span>
        </ol>
    </nav>
    <div id="account" class="col-sm-12 Cwidth container" style="width: 100%;">

        <form method="post" enctype="multipart/form-data" id="account-edit-form" class="form-horizontal">
            {{@csrf_field()}}
            <fieldset>
                <legend>Your Personal Details</legend>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-fullname">Full Name </label>
                    <div class="col-sm-10">
                        <input type="text" name="fullname" value="{{ Auth::user()->name }}" placeholder="Full Name" id="input-fullname" class="form-control">
                        <span class="name-error"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-email">Your email address</label>
                    <div class="col-sm-10">
                        <input type="email" value="{{ Auth::user()->email }}" id="input-email" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
                    <div class="col-sm-10">
                        <input type="tel" name="telephone" value="{{ Auth::user()->mobile_number }}" placeholder="Telephone" id="input-telephone" class="form-control">
                        <span class="number-error"></span>
                    </div>
                </div>
            </fieldset>
            <div class="buttons clearfix">
                <div class="pull-left"><a href="/setting" class="btn btn-default">Back</a></div>
                <div class="pull-right">
                    <input type="submit" value="Continue" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection