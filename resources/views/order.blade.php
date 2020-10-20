@extends('layout.app')

@section('content')
 <style>
     
    #orders-table_wrapper{
        font-size:13px !important;
        
    }
    #orders-table{
        margin-bottom: 30px  !important;
    }

    .feedback-btn{
        font-size:12px !important;  
        margin-top:-5px;
    }

 </style>

<div class="order-container">

    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <p>Orders</p>
            <span>
                <li class="breadcrumb-item"><a href="/home"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item" aria-current="/page"><a href="/setting">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="/page">Orders</li>
            </span>
        </ol>
    </nav>
    <div class="">
        <table id="orders-table" class="table table-hover">
            <thead>
                <tr>
                    <th>Delivered To</th>
                    <th>Dishes</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Payment Method</th>
                    <th>Data & Time</th>
                  
                    <th>Report/Feedback</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                     
                    <td>{{$address->where('id', $order->addressid)->first()->fullname}}, {{$address->where('id', $order->addressid)->first()->address}}</td>
                    <td><?php $ordercart = $ordercart->where('id', $order->cartid)->first() ?>
                        @foreach($dish->where('id' , $ordercart->dishid) as $dishes)
                        {{ $dishes->name }}
                       
                        <?php if($dishes->count() > 1){ echo "," ;} ?>
                        @endforeach
                    </td>
                    <td>{{$order->total_price}} BD</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->payment_method}}</td>
                    <td>{{date("d-m-Y h:i a" , strtotime($order->created_at)) }} </td>
                    <input type="hidden" value={{ $order->id }}>
                    <td style="text-align: center;"><button class="btn feedback-btn btn-primary" data-toggle="modal"
                            data-target="#feedback">Feedback</button></td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Your Opinion Matter</h5>

                    </div>
                    <div class="modal-body">
                        <form action="category/insert" method="post">
                            {{@csrf_field()}}
                            <input class="form-control" type="text" placeholder="Name" name="feedback-name">
                            <input class="form-control" type="text" placeholder="Email" name="feedback-email">
                            <textarea class="form-control" name="feedback-description" placeholder="Description"
                                cols="30" rows="3"></textarea>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection