@extends('layout.adminLayout')

@section('content')



<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-centered">
            <div class="menu-table">
                <h3>Menu Categories</h3>

                <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#addNewCategory"> Add
                    New
                    Category</button>
                @if($errors->any())
                <div>
                    <ul>
                        @foreach($errors->all() as $err)
                        <li style="border-bottom:none;color:red;padding:0;margin:0">{{$err}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="modal fade" id="addNewCategory" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Enter The Name of Category</h5>

                            </div>
                            <div class="modal-body">
                                <form action="category/insert" method="post">
                                    {{@csrf_field()}}
                                    <input class="form-control" type="text" placeholder="Default input"
                                        name="category-name">
                                    <input type="submit" class="btn btn-primary" value="Submit">


                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <ul>

                    @if(!$category->isEmpty())
                    @foreach ($category as $category)
                    <li>
                        <span>{{$category->title}}</span>
                        <span>

                            <button type="button" class="btn btn-light" data-toggle="modal"
                                data-target="#editCategory{{$category->id}}"><i class="fa fa-pencil-square-o"
                                    aria-hidden="true"></i></button>

                            <div class="modal fade" id="editCategory{{$category->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Enter new name of this
                                                category</h5>
                                        </div>
                                        <div class="modal-body">


                                            <form action="category/edit" method="post">
                                                {{@csrf_field()}}

                                                <input type="hidden" name="id" value="{{$category->id}}">
                                                <input name="category-name" class="form-control" type="text"
                                                    placeholder="{{$category->title}}">
                                                <input type="submit" class="btn btn-primary" value="Submit">
                                            </form>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="category/delete/{{$category->id}}"><button class="btn btn-danger"><i
                                        class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                        </span>
                    </li>

                    @endforeach
                    @else
                    <li>No Data Available</li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-centered">
            <div class="menu-table">
                <h3>Add Dishes</h3>
                <select class="form-control">


                    <option>Select a category to view its dishes </option>
                    @foreach ($category1 as $category)
                    <option>{{$category->title}}</option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#addNewDish"> Add New
                    Dish</button>
                <div class="modal fade" id="addNewDish" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Fill the form for new dish</h5>

                            </div>
                            <div class="modal-body">
                                <form method="POST" name="new-dish-form" id="new-dish-form"
                                    enctype="multipart/form-data">
                                    <input class="form-control" type="text" placeholder="Name">
                                    <select class="form-control">
                                        <option>Available</option>
                                        <option>Not Available</option>
                                    </select>
                                    <select class="form-control">
                                        <option>Not Sale</option>
                                        <option>Sale</option>
                                    </select>
                                    <select class="form-control">
                                        <option>Not a Special Product</option>
                                        <option>Special Product</option>
                                    </select>
                                    <input type="number" class="form-control" placeholder="Price">
                                    <input type="number" class="form-control" placeholder="Before Discount Price">
                                    <textarea class="form-control" placeholder="Description"></textarea>
                                    <div class="input-field">
                                        <div class="new-dish-img"></div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <ul>
                    <li>
                        <span>Appetizers</span>
                        <span>
                            <button class="btn btn-light" data-toggle="modal" data-target="#editDish"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                            <div class="modal fade" id="editDish" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit the form for
                                                dish</h5>

                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" name="edit-dish-form" id="edit-dish-form"
                                                enctype="multipart/form-data">
                                                <input class="form-control" type="text" placeholder="Name">
                                                <select class="form-control">
                                                    <option>Available</option>
                                                    <option>Not Available</option>
                                                </select>
                                                <select class="form-control">
                                                    <option>Not Sale</option>
                                                    <option>Sale</option>
                                                </select>
                                                <input type="number" class="form-control" placeholder="Price">
                                                <input type="number" class="form-control"
                                                    placeholder="Before Discount Price">
                                                <textarea class="form-control" placeholder="Description"></textarea>
                                                <div class="input-field">
                                                    <div class="edit-dish-img"></div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </span>
                    </li>

                    <li>No Data Available</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection