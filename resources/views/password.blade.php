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

        <form method="post" enctype="multipart/form-data" class="form-horizontal">
            <fieldset>
                <legend>Your Password</legend>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-current-password">Current Password </label>
                    <div class="col-sm-10">
                        <input type="password" name="current-password" value="" placeholder="current-password"
                            id="input-current-password" class="form-control">
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-new-password">New Password </label>
                    <div class="col-sm-10">
                        <input type="password" name="new-password" value="" placeholder="new-password"
                            id="input-new-password" class="form-control">
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