@extends('layout.app')

@section('content')

<div class="setting-container">
    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <p>Settings</p>
            <span>
                <li class="breadcrumb-item"><a href="/home"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Setting</li>
            </span>
        </ol>
    </nav>
    <div class="setting container">
        <div class="setting-list">
            <div class="setting-list-heading">
                <h2>My Account</h2>
            </div>
            <div class="setting-list-content">
                <ul class="list-unstyled">
                    <li><a href="/account">Edit
                            your account information</a></li>
                    <li><a href="/password">Change
                            your password</a></li>
                    <li><a href="/address">Modify
                            your address book entries</a></li>
                    <li><a href="/wishlist">Modify
                            your wish list</a></li>
                </ul>
            </div>
        </div>
        <div class="setting-list">
            <div class="setting-list-heading">
                <h2>My Orders</h2>
            </div>
            <div class="setting-list-content">
                <ul class="list-unstyled">
                    <li><a href="/order">Order History</a></li>
                    <li><a href="">My Cart</a></li>
                    <li><a href="">Transactions</a></li>
                </ul>
            </div>
        </div>
        <div class="setting-list">
            <div class="setting-list-heading">
                <h2>Newsletter</h2>
            </div>
            <div class="setting-list-content">
                <ul class="list-unstyled">
                    <li><a href="">Newsletter</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


@endsection