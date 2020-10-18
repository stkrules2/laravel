@extends('layout.app')

@section('content')

<div class="wishlist-container">
    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <p>wishlist</p>
            <span>
                <li class="breadcrumb-item"><a href="/home"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item" aria-current="/page"><a href="/setting">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="/page">Wishlist</li>
            </span>
        </ol>
    </nav>
    <div id="wishlist" class="col-sm-12 Cwidth container" style="width: 100%;">

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td class="text-center">Image</td>
                    <td class="text-left">Name</td>
                    <td class="text-right">Availability</td>
                    <td class="text-right">Unit Price</td>
                    <td class="text-right">Action</td>
                </tr>
            </thead>
            <tbody>
                @if(isset($wish))
                @foreach($wish as $wishdish)


                <tr>
                    <td class="text-center image-col"><img src="../storage/{{$dish->where('id', $wishdish->dishid)->first()->image1}}" alt="{{$dish->where('id', $wishdish->dishid)->first()->name}}" title="{{$dish->where('id', $wishdish->dishid)->first()->name}}"></a></td>
                    <td class="text-left">{{$dish->where('id', $wishdish->dishid)->first()->name}}</a></td>
                    @if($dish->where('id', $wishdish->dishid)->first()->availibility)
                    <td class="text-right">Available</td>
                    @else
                    <td class="text-right">Not Available</td>
                    @endif

                    <td class="text-right">
                        <div class="price"> BD
                            {{number_format($dish->where('id', $wishdish->dishid)->first()->price, 3)}}
                        </div>
                    </td>
                    <td class="text-right"><button type="button" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add to Cart" id="{{$wishdish->id}}"><i class="fa fa-shopping-cart"></i></button>
                        <a href="/user/remove/wishlist{{$wishdish->id}}" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>

        </table>
        <div class="buttons clearfix">
            <div class="pull-right"><a href="/setting" class="btn btn-default">Back</a></div>
        </div>

    </div>
</div>
@endsection