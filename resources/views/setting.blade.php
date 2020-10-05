@extends('layout.app')

@section('content')

<div class="setting-container">
    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <p>Setting</p>
            <span>
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Setting</li>
            </span>
        </ol>
    </nav>
    <div class="setting container">
        <div class="setting-sidebar">
            <ul>
                <li>Profile Setting</li>
                <li>Change Password</li>
                <li>Newsletter</li>
            </ul>
        </div>
        <div class="setting-content"></div>
    </div>
</div>


@endsection