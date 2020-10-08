@extends('layout.app')

@section('content')

<div class="transaction-container">
    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <p>Transaction</p>
            <span>
                <li class="breadcrumb-item"><a href="/home"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item" aria-current="/page"><a href="/setting">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="/page">Transaction</li>
            </span>
        </ol>
    </nav>
    <div id="content" class="col-sm-12 Cwidth container" style="width: 100%;">

        <p>Total <b>$0.00</b>.</p>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td class="text-left">Date Added</td>
                        <td class="text-left">Description</td>
                        <td class="text-right">Amount (USD)</td>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td class="text-center" colspan="5">Your shopping cart is empty!</td>
                    </tr>
                </tbody>

            </table>
        </div>
        <div class="row">
            <div class="col-sm-6 text-left"></div>
            <div class="col-sm-6 text-right">Showing 0 to 0 of 0 (0 Pages)</div>
        </div>
        <div class="buttons clearfix">
            <div class="pull-right"><a
                    href="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/index.php?route=account/account"
                    class="btn btn-primary">Continue</a></div>
        </div>
    </div>
</div>
@endsection