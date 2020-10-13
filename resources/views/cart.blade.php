@extends('layout.app')

@section('content')

<div class="cart-container">
    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <p>My Cart</p>
            <span>
                <li class="breadcrumb-item"><a href="/home"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item" aria-current="/page"><a href="/setting">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="/page">Cart</li>
            </span>
        </ol>
    </nav>
    <div class="container">
        <div id="content" class="col-sm-12 Cwidth" style="width: 100%;">

            <form method="post" enctype="multipart/form-data" class="cart-form">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td class="text-center">Image</td>
                                <td class="text-left">Product Name</td>
                                <td class="text-left">Quantity</td>
                                <td class="text-right">Unit Price</td>
                                <td class="text-right text-right-price">Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($cart)>0)
                            @foreach($cart as $carts)
                            <tr>
                                <td class="text-center">
                                    <a href=""><img
                                            src="../storage/{{$dish->where('id', $carts->dishid)->first()->image1}}"
                                            alt="{{$dish->where('id', $carts->dishid)->first()->name}}"
                                            title="{{$dish->where('id', $carts->dishid)->first()->name}}"
                                            class="img-thumbnail"></a>
                                </td>
                                <td class="text-left"><a
                                        href="/home">{{$dish->where('id', $carts->dishid)->first()->name}}</a>
                                </td>
                                <td class="text-left">
                                    <div class="cart_input_block input-group btn-block">
                                        <input type="text" value="{{$carts->countdish}}" size="1"
                                            class="form-control cart-dish-count">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-primary main refresh-cart"
                                                id="{{$carts->id}}"><i class="fa fa-refresh"></i></button>
                                            <a href="/user/remove/cart/page{{$carts->id}}"><button type="button"
                                                    class="btn btn-danger"><i class="fa fa-times-circle"
                                                        id="{{$carts->id}}"></i></button></a>
                                        </span>
                                    </div>
                                </td>
                                <td class="text-right unit-price">
                                    BD{{$dish->where('id', $carts->dishid)->first()->price}}</td>
                                <td class="text-right total-price">
                                    BD{{$dish->where('id', $carts->dishid)->first()->price}}</td>
                            </tr>
                            @endforeach

                            @else
                            <tr>
                                <td>You have no itesms in cart</td>
                            </tr>
                            @endif

                        </tbody>

                    </table>
                </div>
            </form>
            <div class="row" style="justify-content: flex-end;">


                <div class="col-sm-4 sub-total-table">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="text-right heading-title"><strong>Sub-Total:</strong></td>
                                <td class="text-right total-amount">
                                    BD </td>
                            </tr>
                            <tr>
                                <td class="text-right heading-title"><strong>Flat Shipping Rate:</strong></td>
                                <td class="text-right total-amount">
                                    BD </td>
                            </tr>
                            <tr>
                                <td class="text-right heading-title"><strong>Total:</strong></td>
                                <td class="text-right total-amount">
                                    BD </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="buttons">
                <div class="pull-left"><a href="/home" class="btn btn-default cnt">Continue Shopping</a></div>
                <div class="pull-right"><a href="/checkout" class="btn btn-primary checkout">Checkout</a></div>
            </div>
        </div>
    </div>


</div>
@endsection