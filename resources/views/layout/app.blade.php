<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kabab House</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,500,600,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Muli:400,600,700,800,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ URL::to('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/styles.css') }}">

</head>

<body>
    <div id="loading">
        <img id="loading-image" src="{{ URL::to('img/loader/rings.gif')}}" alt="Loading..." />
    </div>
    <div class="page">

        <header>
            <nav class="navbar">
                <div class="logo-div">
                    <a href="/home"><img src="{{ URL::to('img/logo/kabab-house-logo-org.png') }}" alt="Kabab House"
                            class="logo"></a>
                </div>
                <div class="menu-icons">

                    <a class="btn collapse-btn" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                        aria-controls="collapseExample" style="float:left;font-size:23px">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>

                    <ul class="menu-list collapse" id="collapseExample">



                        @if(isset($category))
                        <?php $count = 0 ?>
                        @foreach($category as $cat)
                        <?php $count = $count + 1 ?>
                        @if($count === 6)
                        @break
                        @endif
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#categoryScroll{{$cat->id}}" onclick="scrollLink(event)"
                                data-toggle="dropdown" id="navbarDropdown2" role="button" aria-haspopup="true"
                                aria-expanded="false"> {{$cat->title}} </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                @if(isset($dish))
                                @foreach($dish as $di)
                                @if($cat->id == $di->category_id)
                                <a href="#categoryScroll{{$cat->id}}" onclick="scrollLink(event)"
                                    class="dropdown-item">{{$di->name}}</a>
                                @endif
                                @endforeach
                                @endif
                            </div>
                        </li>


                        @endforeach
                        @if($count === 6)
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navbarDropdown2"
                                role="button" aria-haspopup="true" aria-expanded="false"> More </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                <?php $count = $count - 1 ?>
                                @foreach($category as $cat2)
                                <?php $count = $count - 1 ?>
                                @if($count < 0) <a href="#categoryScroll{{$cat2->id}}" onclick="scrollLink(event)"
                                    class="dropdown-item">{{$cat2->title}}</a>
                                    @endif
                                    @endforeach


                            </div>
                        </li>
                        @endif
                        @endif


                    </ul>

                    <div class="icons">
                        <span class="icons-span">


                            <span class="dropdown">
                                <i class="fa fa-user dropdown-toggle" class="dropdown-toggle" href="#"
                                    data-toggle="dropdown" id="navbarDropdown2" role="button" aria-haspopup="true"
                                    aria-expanded="false" aria-hidden="true"></i>
                                <div class="dropdown-menu user" aria-labelledby="navbarDropdown2">
                                    <img src="https://www.w3schools.com/howto/img_avatar.png" alt="User"
                                        style="border-radius: 50%;">
                                    @guest
                                    <p>Guest</p>
                                    <div class="dropdown-divider"></div>
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <i class="fa fa-cog" aria-hidden="true"></i>{{ __('Login') }}
                                    </a>

                                    @if (Route::has('register'))

                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="fa fa-cog" aria-hidden="true"></i>{{ __('Register') }}
                                    </a>
                                    @endif
                                    @else
                                    <p>{{ Auth::user()->name }}</p>
                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="/setting">
                                        <i class="fa fa-cog" aria-hidden="true"></i>Setting
                                    </a>
                                    <a class="dropdown-item" href="/wishlist">
                                        @if(isset($wish))
                                        <i class="fa fa-heart" aria-hidden="true"></i>Wishlist ({{count($wish)}})
                                        @else
                                        <i class="fa fa-heart" aria-hidden="true"></i>Wishlist (0)
                                        @endif

                                    </a>
                                    <a class="dropdown-item" href="/order">
                                        <i class="fa fa-truck" aria-hidden="true"></i>My Orders
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>{{__('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    @endguest
                                </div>
                            </span>
                            <span class="dropdown">
                                <i class="fa fa-shopping-cart dropdown-toggle" class="dropdown-toggle" href="#"
                                    data-toggle="dropdown" id="navbarDropdown2" role="button" aria-haspopup="true"
                                    aria-expanded="false" aria-hidden="true"></i>
                                <div class="dropdown-menu shopping-cart" aria-labelledby="navbarDropdown2">
                                    @guest
                                    <li class="empty-cart-list">
                                        <p>You need to login to access cart!</p>
                                    </li>
                                    @else
                                    <span>

                                        @if(count($cart)>0)
                                        @foreach($cart as $carts)
                                        <li class="cart-product">
                                            <div class="cart-list">
                                                <div class="cart-img"><img
                                                        src="../storage/{{$dish->where('id', $carts->dishid)->first()->image1}}"
                                                        alt="{{$dish->where('id', $carts->dishid)->first()->name}}"
                                                        title="{{$dish->where('id', $carts->dishid)->first()->name}}">
                                                </div>
                                                <div class="cart-name"><a
                                                        href="#">{{$dish->where('id', $carts->dishid)->first()->name}}</a>
                                                </div>
                                                <div class="cart-number">x <br> {{$carts->countdish}} </div>
                                                <div class="cart-price">
                                                    BD{{number_format($dish->where('id', $carts->dishid)->first()->price, 3)}}
                                                </div>
                                                <div class="cart-remove"><i class="fa fa-times" aria-hidden="true"
                                                        id="{{$carts->id}}"></i>
                                                </div>

                                            </div>
                                        </li>
                                        @endforeach

                                    </span>
                                    <div class="cart-footer">
                                        <div class="cart-total-price">

                                            <div class="total">Total <b>BD {{number_format($total, 3)}}</b></div>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <p class="text-right"><a href="/mycart" class="btn"><strong>
                                                    View Cart</strong></a><a href="/checkout"
                                                class="btn"><strong>Checkout</strong></a>
                                        </p>
                                    </div>
                                    @else
                                    <li class="empty-cart-list">
                                        <p>Your shopping cart is empty!</p>
                                    </li>
                                    @endif
                                    @endguest

                                </div>
                            </span>
                            <span class='badge' id='lblCartCount'>
                                @if(isset($cart))
                                {{count($cart)}}
                                @else
                                0
                                @endif
                            </span>

                        </span>

                    </div>
            </nav>
        </header>


        <main>


            @yield('content')
        </main>
        <div class="newsletter">
            <div class="newsletter-text">
                <h3><i class="fa fa-envelope" aria-hidden="true"></i>Sign up for newsletter</h3>
                <p>Sign up with us and get latest deals, offers & updates about store.</p>
            </div>
            <form name="subscribe" id="subscribe">
                <input type="text" placeholder="Your email address" value="" name="subscribe_email"
                    id="subscribe_email">

                <button class="button btn btn-primary" type="submit"><span>subscribe</span><i
                        class="fa fa-paper-plane"></i></button>

            </form>
        </div>
        <section id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-4 col-md-4">
                        <a href="#demo1" data-toggle="collapse">
                            <h5>Categories</h5>
                        </a>
                        <ul class="list-unstyled quick-links link-1">
                            @if(isset($category))
                            <?php $count = 0; ?>

                            @foreach($category as $cat3)
                            @if($count == 5)
                            @break
                            @endif
                            <li><a href="#categoryScroll{{$cat3->id}}" onclick="scrollLink(event)">{{$cat3->title}}</a>
                            </li>
                            <?php $count = $count + 1; ?>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-4">
                        <a href="#demo2" data-toggle="collapse">
                            <h5>Users</h5>
                        </a>
                        <ul class="list-unstyled quick-links link-2">
                            <li><a href="/mycart">Manage Cart</a></li>
                            <li><a href="/wishlist">Wishlit</a></li>
                            <li><a href="/order">Orders</a></li>
                            <li><a href="/transaction">Your Transactions</a></li>
                            <li><a href="/newsletter">Newsletter</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-4">
                        <a href="#demo3" data-toggle="collapse">
                            <h5>Kabab House</h5>
                        </a>
                        <ul class="list-unstyled quick-links link-3">
                            <li><a href="/setting">Settings</a></li>
                            <li><a href="#aboutus" onclick="scrollLink(event)">About Us</a></li>

                            <li><a href="/contact">Contact Us</a></li>
                            <li class="special-links-fonts">
                                <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;+973 1616 1000
                            </li>
                            <li class="special-links-fonts">
                                <i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp;
                                Building:360, Road:1805, Block:318, Manama, Bahrain (2,313.89 km)
                                318 Manama, Bahrain
                            </li>

                        </ul>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                        <ul class="list-unstyled list-inline social text-center">
                            <li class="list-inline-item"><a href="https://www.facebook.com/bahrainkabab/"
                                    target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.instagram.com/bahrainkabab"
                                    target="_blank"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <hr>
                </div>

            </div>
        </section>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ URL::to('js/notify.min.js') }}"></script>
    <script src="{{ URL::to('js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::to('js/userScript.js') }}"></script>
</body>

</html>