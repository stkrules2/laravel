@extends('layout.app')

@section('content')

<div class="contact-container">
    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <p>Contact Us</p>
            <span>
                <li class="breadcrumb-item"><a href="/home"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="/page">Contact Us</li>
            </span>
        </ol>
    </nav>
    <div class="container">
        <div id="content" class="col-sm-12 Cwidth" style="width: 100%;">

            <h3>Our Location</h3>
            <div class="panel panel-default contact-location">
                <div class="panel-body">
                    <div class="row">


                        <div class="col-sm-3 store-address">
                            <div class="location-title"><i class="fa fa-home"></i> Your Store </div>
                            <address class="location-detail">
                                Building:360, Road:1805,<br>
                                Block:318, Manama, Bahrain (2,313.89 km)
                                ,<br>
                                318 Manama, Bahrain
                            </address>
                            <a href="https://goo.gl/maps/TPdQDuvZZFbqdLcL7" target="_blank" class="btn btn-info"><i
                                    class="fa fa-map-marker"></i> View Google
                                Map</a>
                        </div>

                        <div class="col-sm-3 store-contact">
                            <div class="location-title"><i class="fa fa-phone"></i> Telephone </div>
                            <div class="location-detail"> +973 1616 1000 </div>
                        </div>

                        <div class="col-sm-3 store-status">
                            <div class="location-title"><i class="fa fa-clock-o"></i> Opening Times </div>
                            <div class="location-detail"> Monday To Sunday<br>
                                9:00AM to 7:00PM </div>
                            <div class="location-title"><i class="fa fa-comment"></i> Comments </div>
                            <div class="location-detail"> Best Food in Town. </div>
                        </div>

                    </div>
                </div>
            </div>
            <form method="post" enctype="multipart/form-data" class="form-horizontal" id="contact-us-form">
                @csrf
                <fieldset>
                    <legend>Contact Us</legend>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-name">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="" id="input-name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-email">Your email address</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" value="" id="input-email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-enquiry">Enquiry</label>
                        <div class="col-sm-10">
                            <textarea name="enquiry" rows="10" id="input-enquiry" class="form-control"></textarea>
                        </div>
                    </div>

                </fieldset>
                <div class="buttons">
                    <div class="pull-right">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection