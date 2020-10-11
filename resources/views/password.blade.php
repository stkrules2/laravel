@extends('layout.app')

@section('content')

<div class="password-container">
    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <p>Change Password</p>
            <span>
                <li class="breadcrumb-item"><a href="/home"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item" aria-current="/page"><a href="/setting">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="/page">Change Password</li>
            </span>
        </ol>
    </nav>
    <div id="password-setting" class="col-sm-12 Cwidth container" style="width: 100%;">

        <form method="post" enctype="multipart/form-data" id="password-change-form" class="form-horizontal">
            {{@csrf_field()}}
            <fieldset>
                <legend>Your Password</legend>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-current-password">Current Password </label>
                    <div class="col-sm-10">
                        <input type="password" name="current_password" value="" placeholder="Current Password" id="input-current-password" class="form-control">
                        <span class="current_password_error"></span>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-new-password">New Password </label>
                    <div class="col-sm-10">
                        <input type="password" name="new_password" value="" placeholder="New Password" id="input-new-password" class="form-control">
                        <span class="new_password_error"></span>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="confirm-new-password">Confirm Password </label>
                    <div class="col-sm-10">
                        <input type="password" name="confirm_password" value="" placeholder="Confirm Password" id="input-confirm-password" class="form-control">
                        <span class="confirm_password_error"></span>
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