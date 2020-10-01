@extends('layout.adminLayout')

@section('content')

<div class="container menu-table banner-table">
    <h3>Add or Edit maximum of 5 images for banner</h3>

    <form action="banner/insert" method="post" name="banner-images" id="banner-images" enctype="multipart/form-data">
        {{@csrf_field()}}
        <div class="input-field">

            <div class="image-box">
                <div class="dropzone-wrapper">
                    @isset($banner)
                    @if($banner->path1)
                    <button type="button" id="delete-img-btn" class="banner-1"><i class="fa fa-times"
                            aria-hidden="true"></i></button>
                    @endif
                    @endisset
                    <div class="dropzone-desc">
                        <i class="fa fa-cloud-upload"></i>
                        <p>Choose an image file or drag it here.</p>
                    </div>
                    <input type="file" name="banner-img1" class="dropzone banner-img1" value="">
                    @isset($banner)
                    @if($banner->path1)
                    <img src="../storage/{{$banner->path1}}" alt="">
                    @endif
                    @endisset
                </div>
                <div class="dropzone-wrapper">
                    @isset($banner)
                    @if($banner->path2)
                    <button type="button" id="delete-img-btn" class="banner-2"><i class="fa fa-times"
                            aria-hidden="true"></i></button>
                    @endif
                    @endisset
                    <div class="dropzone-desc">
                        <i class="fa fa-cloud-upload"></i>
                        <p>Choose an image file or drag it here.</p>
                    </div>
                    <input type="file" name="banner-img2" class="dropzone banner-img2" value="">
                    @isset($banner)
                    @if($banner->path2)
                    <img src="../storage/{{$banner->path2}}" alt="">
                    @endif
                    @endisset
                </div>
                <div class="dropzone-wrapper">
                    @isset($banner)
                    @if($banner->path3)
                    <button type="button" id="delete-img-btn" class="banner-3"><i class="fa fa-times"
                            aria-hidden="true"></i></button>
                    @endif
                    @endisset
                    <div class="dropzone-desc">
                        <i class="fa fa-cloud-upload"></i>
                        <p>Choose an image file or drag it here.</p>
                    </div>
                    <input type="file" name="banner-img3" class="dropzone banner-img3" value="">
                    @isset($banner)
                    @if($banner->path3)
                    <img src="../storage/{{$banner->path3}}" alt="">
                    @endif
                    @endisset
                </div>
                <div class="dropzone-wrapper">
                    @isset($banner)
                    @if($banner->path4)
                    <button type="button" id="delete-img-btn" class="banner-4"><i class="fa fa-times"
                            aria-hidden="true"></i></button>
                    @endif
                    @endisset
                    <div class="dropzone-desc">
                        <i class="fa fa-cloud-upload"></i>
                        <p>Choose an image file or drag it here.</p>
                    </div>
                    <input type="file" name="banner-img4" class="dropzone banner-img4" value="">
                    @isset($banner)
                    @if($banner->path4)
                    <img src="../storage/{{$banner->path4}}" alt="">
                    @endif
                    @endisset
                </div>
                <div class="dropzone-wrapper">
                    @isset($banner)
                    @if($banner->path5)
                    <button type="button" id="delete-img-btn" class="banner-5"><i class="fa fa-times"
                            aria-hidden="true"></i></button>
                    @endif
                    @endisset
                    <div class="dropzone-desc">
                        <i class="fa fa-cloud-upload"></i>
                        <p>Choose an image file or drag it here.</p>
                    </div>
                    <input type="file" name="banner-img5" class="dropzone banner-img5" value="">
                    @isset($banner)
                    @if($banner->path5)
                    <img src="../storage/{{$banner->path5}}" alt="">
                    @endif
                    @endisset
                </div>
            </div>
        </div>
        <li class="note-li-tag">Recommended Image Size: <b>1770*830px</b></li>
        <input type="submit" value="Save Changes" class="btn btn-primary">
    </form>
</div>

@endsection