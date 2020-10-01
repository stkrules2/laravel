@extends('layout.adminLayout')

@section('content')

<div class="container menu-table">
    <h3>Edit History tab of Homepage</h3>
    <form action="history/insert" method="POST" name="history-form" id="history-form" enctype="multipart/form-data">
        {{@csrf_field()}}
        <textarea class="form-control" placeholder="Description"
            name="history-description">{{$history->description}}</textarea>
        <label for="Banne Image"> <b> Can only add maximum of 5 images:</b></label>
        <div class="image-box">
            <div class="dropzone-wrapper">
                @isset($history)
                @if($history->path1)
                <button type="button" id="delete-img-btn" class="history-1"><i class="fa fa-times"
                        aria-hidden="true"></i></button>
                @endif
                @endisset
                <div class="dropzone-desc">
                    <i class="fa fa-cloud-upload"></i>
                    <p>Choose an image file or drag it here.</p>
                </div>
                <input type="file" name="history-img1" class="dropzone history-img1" value="0">
                @isset($history)
                @if($history->path1)
                <img src="../storage/{{$history->path1}}" alt="">
                @endif
                @endisset

            </div>
            <div class="dropzone-wrapper">
                @isset($history)
                @if($history->path2)
                <button type="button" id="delete-img-btn" class="history-2"><i class="fa fa-times"
                        aria-hidden="true"></i></button>
                @endif
                @endisset
                <div class="dropzone-desc">
                    <i class="fa fa-cloud-upload"></i>
                    <p>Choose an image file or drag it here.</p>
                </div>
                <input type="file" name="history-img2" class="dropzone history-img2" value="0">
                @isset($history)
                @if($history->path2)
                <img src="../storage/{{$history->path2}}" alt="">
                @endif
                @endisset
            </div>
            <div class="dropzone-wrapper">
                @isset($history)
                @if($history->path3)
                <button type="button" id="delete-img-btn" class="history-3"><i class="fa fa-times"
                        aria-hidden="true"></i></button>
                @endif
                @endisset
                <div class="dropzone-desc">
                    <i class="fa fa-cloud-upload"></i>
                    <p>Choose an image file or drag it here.</p>
                </div>
                <input type="file" name="history-img3" class="dropzone history-img3" value="0">
                @isset($history)
                @if($history->path3)
                <img src="../storage/{{$history->path3}}" alt="">
                @endif
                @endisset
            </div>
            <div class="dropzone-wrapper">
                @isset($history)
                @if($history->path4)
                <button type="button" id="delete-img-btn" class="history-4"><i class="fa fa-times"
                        aria-hidden="true"></i></button>
                @endif
                @endisset
                <div class="dropzone-desc">
                    <i class="fa fa-cloud-upload"></i>
                    <p>Choose an image file or drag it here.</p>
                </div>
                <input type="file" name="history-img4" class="dropzone history-img4" value="0">
                @isset($history)
                @if($history->path4)
                <img src="../storage/{{$history->path4}}" alt="">
                @endif
                @endisset
            </div>
            <div class="dropzone-wrapper">
                @isset($history)
                @if($history->path5)
                <button type="button" id="delete-img-btn" class="history-5"><i class="fa fa-times"
                        aria-hidden="true"></i></button>
                @endif
                @endisset
                <div class="dropzone-desc">
                    <i class="fa fa-cloud-upload"></i>
                    <p>Choose an image file or drag it here.</p>
                </div>
                <input type="file" name="history-img5" class="dropzone history-img5" value="0">
                @isset($history)
                @if($history->path5)
                <img src="../storage/{{$history->path5}}" alt="">
                @endif
                @endisset
            </div>
        </div>
        <li class="note-li-tag">Recommended Image Size: <b>270*470px</b></li>
        <input type="submit" value="Save Changes" class="btn btn-primary">
    </form>
</div>

@endsection