@extends('layout.app')

@section('content')

<div class="newsletter-container">
    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <p>Newsletter Subscription</p>
            <span>
                <li class="breadcrumb-item"><a href="/home"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item" aria-current="/page"><a href="/setting">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="/page">Newsletter</li>
            </span>
        </ol>
    </nav>
    <div class="container">
        <form action="/user/change/newsletter/email" method="post" enctype="multipart/form-data"
            class="form-horizontal">
            @csrf
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Subscribe</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <span class="radio-wrapper">
                                @if(isset($news))
                                @if(count($news)>0)

                                <input type="radio" name="newsletter" value=1 class="radioid" checked="checked"></span>
                            Yes </label>
                        <label class="radio-inline">
                            <span class="radio-wrapper">
                                <input type="radio" name="newsletter" value=0 class="radioid"></span>
                            No</label>
                        @else
                        <input type="radio" name="newsletter" value=1 class="radioid"></span>
                        Yes </label>
                        <label class="radio-inline">
                            <span class="radio-wrapper">
                                <input type="radio" name="newsletter" value=0 class="radioid" checked="checked"></span>
                            No</label>
                        @endif
                        @else
                        <input type="radio" name="newsletter" value=1 class="radioid"></span>
                        Yes </label>
                        <label class="radio-inline">
                            <span class="radio-wrapper">
                                <input type="radio" name="newsletter" value=0 class="radioid"></span>
                            No</label>
                        @endif
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