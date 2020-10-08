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
                                <td class="text-left">Model</td>
                                <td class="text-left">Quantity</td>
                                <td class="text-right">Unit Price</td>
                                <td class="text-right text-right-price">Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <a href=""><img
                                            src="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/image/cache/catalog/demo/product/20-70x91.jpg"
                                            alt="voluptate velit esse" title="voluptate velit esse"
                                            class="img-thumbnail"></a>
                                </td>
                                <td class="text-left"><a
                                        href="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/index.php?route=product/product&amp;product_id=40">voluptate
                                        velit esse</a>
                                </td>
                                <td class="text-left">product 11</td>
                                <td class="text-left">
                                    <div class="cart_input_block input-group btn-block">
                                        <input type="text" value="2" size="1" class="form-control">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-primary main"><i
                                                    class="fa fa-refresh"></i></button>
                                            <button type="button" class="btn btn-danger"><i
                                                    class="fa fa-times-circle"></i></button>
                                        </span>
                                    </div>
                                </td>
                                <td class="text-right unit-price">$101.00</td>
                                <td class="text-right total-price">$202.00</td>
                            </tr>

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
                                <td class="text-right total-amount">$3,402.00</td>
                            </tr>
                            <tr>
                                <td class="text-right heading-title"><strong>Flat Shipping Rate:</strong></td>
                                <td class="text-right total-amount">$5.00</td>
                            </tr>
                            <tr>
                                <td class="text-right heading-title"><strong>Total:</strong></td>
                                <td class="text-right total-amount">$3,407.00</td>
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