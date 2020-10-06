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
                    <td class="text-left">Product Name</td>
                    <td class="text-left">Model</td>
                    <td class="text-right">Stock</td>
                    <td class="text-right">Unit Price</td>
                    <td class="text-right">Action</td>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td class="text-center"><a href=""><img
                                src="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/image/cache/catalog/demo/product/19-70x91.jpg"
                                alt="voluptas sit aspernatur" title="voluptas sit aspernatur"></a></td>
                    <td class="text-left"><a href="">voluptas
                            sit aspernatur</a></td>
                    <td class="text-left">product 20</td>
                    <td class="text-right">In Stock</td>
                    <td class="text-right">
                        <div class="price"> $100.00
                        </div>
                    </td>
                    <td class="text-right"><button type="button" onclick="cart.add('48');" data-toggle="tooltip"
                            title="" class="btn btn-primary" data-original-title="Add to Cart"><i
                                class="fa fa-shopping-cart"></i></button>
                        <a href="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/index.php?route=account/wishlist&amp;remove=48"
                            data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i
                                class="fa fa-times"></i></a>
                    </td>
                </tr>
            </tbody>

        </table>
        <div class="buttons clearfix">
            <div class="pull-right"><a href="/setting" class="btn btn-default">Back</a></div>
        </div>

    </div>
</div>
@endsection