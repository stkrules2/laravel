@extends('layout.app')

@section('content')

<div class="address-container">
    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <p>Address Book Entries</p>
            <span>
                <li class="breadcrumb-item"><a href="/home"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item" aria-current="/page"><a href="/setting">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="/page">Address Book</li>
            </span>
        </ol>
    </nav>
    <div id="address" class="col-sm-12 Cwidth container" style="width: 100%;">

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <td class="text-left">Sulman Azhar<br>H#144, Alflah-town, Bedian road Lahore cantt<br>
                            54810</td>
                        <td class="text-right"><a href="" class="btn btn-info">Edit</a> &nbsp; <a href=""
                                class="btn btn-danger">Delete</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="buttons clearfix">
            <div class="pull-left"><a href="/setting" class="btn btn-default">Back</a></div>
            <div class="pull-right">
                <a href="/new/address" class="btn btn-primary">New Address</a>
            </div>
        </div>
    </div>
</div>
@endsection