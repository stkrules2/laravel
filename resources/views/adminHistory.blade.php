@extends('layout.adminLayout')

@section('content')

<div class="container menu-table">
    <h3>Edit History tab of Homepage</h3>
    <form method="POST" name="history-form" id="history-form" enctype="multipart/form-data">

        <textarea class="form-control" placeholder="Description"></textarea>
        <label for="Banne Image"> <b> Can only add maximum of 5 images:</b></label>
        <div class="input-field">
            <div class="history-img"></div>
        </div>
    </form>
</div>

@endsection