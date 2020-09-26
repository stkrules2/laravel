@extends('layout.adminLayout')

@section('content')

<div class="container menu-table banner-table">
    <h3>Add or Edit maximum of 5 images for banner</h3>

    <form method="POST" name="banner-images" id="banner-images" enctype="multipart/form-data">

        <div class="input-field">

            <div class="banner-img"></div>
        </div>
    </form>
</div>

@endsection