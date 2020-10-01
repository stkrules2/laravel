@extends('layout.adminLayout')

@section('content')

<div class="container menu-table">
    <form action="promotion/insert" method="POST" name="promotion-form" id="promotion-form"
        enctype="multipart/form-data">
        {{@csrf_field()}}
        <h3> Add maximum of 3 images for promotion tab in Homepage</h3>
        <div class="promotion-img-div">
            <div class="dropzone-wrapper">
                @isset($promotion)
                @if($promotion->path1)
                <button type="button" id="delete-img-btn" class="promotion-1"><i class="fa fa-times"
                        aria-hidden="true"></i></button>
                @endif
                @endisset
                <div class="dropzone-desc">
                    <i class="fa fa-cloud-upload"></i>
                    <p>Select image of 630*350 only.</p>
                </div>
                <input type="file" name="promotion-img1" class="dropzone promotion-img1" value="0">
                @isset($promotion)
                @if($promotion->path1)
                <img src="../storage/{{$promotion->path1}}" alt="">
                @endif
                @endisset
            </div>
        </div>
        <div class="promotion-img-div">
            <div class="dropzone-wrapper">
                @isset($promotion)
                @if($promotion->path2)
                <button type="button" id="delete-img-btn" class="promotion-2"><i class=" fa fa-times"
                        aria-hidden="true"></i></button>
                @endif
                @endisset
                <div class="dropzone-desc">
                    <i class="fa fa-cloud-upload"></i>
                    <p>Select image of 630*350 only.</p>
                </div>
                <input type="file" name="promotion-img2" class="dropzone promotion-img2" value="0">
                @isset($promotion)
                @if($promotion->path2)
                <img src="../storage/{{$promotion->path2}}" alt="">
                @endif
                @endisset
            </div>
        </div>
        <div class="promotion-img-div">
            <div class="dropzone-wrapper">
                @isset($promotion)
                @if($promotion->path3)
                <button type="button" id="delete-img-btn" class="promotion-3"><i class=" fa fa-times"
                        aria-hidden="true"></i></button>
                @endif
                @endisset
                <div class="dropzone-desc">
                    <i class="fa fa-cloud-upload"></i>
                    <p>Select image of 424*350 only.</p>
                </div>
                <input type="file" name="promotion-img3" class="dropzone promotion-img3" value="0">
                @isset($promotion)
                @if($promotion->path3)
                <img src="../storage/{{$promotion->path3}}" alt="">
                @endif
                @endisset
            </div>
        </div>


        <input type="submit" value="Save Changes" class="btn btn-primary">
    </form>
</div>

@endsection