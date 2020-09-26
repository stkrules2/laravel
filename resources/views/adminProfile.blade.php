@extends('layout.adminLayout')

@section('content')

<div class="container menu-table profile-container">
    <h3>Profile</h3>
    <div class="row">
        <div class="col-sm-12 col-md-6 profile-image">
            <img src="https://www.w3schools.com/howto/img_avatar.png" alt="">
        </div>
        <div class="col-sm-12 col-md-6 profile-data">
            <span>
                <label for="Name">Name:</label>
                <p>Sulman Azhar</p>
            </span>
            <span>
                <label for="Email">Email:</label>
                <p>something@gmail.com</p>
            </span>
            <span>
                <label for="Phone">Phone#:</label>
                <p>3545-8654</p>
            </span>
            <span>
                <label for="Name">Address:</label>
                <p>Something Sometdsadsahing at dsadsasome place </p>
            </span>
        </div>
    </div>
</div>

@endsection