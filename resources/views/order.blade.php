@extends('layout.app')

@section('content')

<div class="order-container">

    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <p>Orders</p>
            <span>
                <li class="breadcrumb-item"><a href="/home"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="/page"><a href="/setting">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="/page">Orders</li>
            </span>
        </ol>
    </nav>
    <div class="container">
        <table id="orders-table" class="table table-hover">
            <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Dishes</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Payment Type</th>
                    <th>Data & Time</th>
                    <th>Report/Feedback</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                    <td style="text-align: center;"><button class="btn btn-primary" data-toggle="modal"
                            data-target="#feedback">Feedback</button></td>
                </tr>

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