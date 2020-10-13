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
    <style>

    </style>
</head>

<body>

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
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        @if(isset($category))
                        <?php $count = 0 ?>
                        @foreach($category as $cat)
                        <?php $count = $count + 1 ?>
                        @if($count === 6)
                        @break
                        @endif
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navbarDropdown2"
                                role="button" aria-haspopup="true" aria-expanded="false"> {{$cat->title}} </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                @if(isset($dish))
                                @foreach($dish as $di)
                                @if($cat->id == $di->category_id)
                                <a href="#" class="dropdown-item">{{$di->name}}</a>
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
                                @if($count < 0) <a href="#" class="dropdown-item">{{$cat2->title}}</a>
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
                                <i class="fa fa-search dropdown-toggle" class="dropdown-toggle" href="#"
                                    data-toggle="dropdown" id="navbarDropdown2" role="button" aria-haspopup="true"
                                    aria-expanded="false" aria-hidden="true"></i>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                    check
                                </div>
                            </span>
                            <span class="dropdown">
                                <i class="fa fa-user dropdown-toggle" class="dropdown-toggle" href="#"
                                    data-toggle="dropdown" id="navbarDropdown2" role="button" aria-haspopup="true"
                                    aria-expanded="false" aria-hidden="true"></i>
                                <div class="dropdown-menu user" aria-labelledby="navbarDropdown2">
                                    <img src="https://www.w3schools.com/howto/img_avatar.png" alt="User"
                                        style="border-radius: 50%;">
                                    <p>{{ Auth::user()->name }}</p>
                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="/setting">
                                        <i class="fa fa-cog" aria-hidden="true"></i>Setting
                                    </a>
                                    <a class="dropdown-item" href="/wishlist">
                                        <i class="fa fa-heart" aria-hidden="true"></i>Wishlist (0)
                                    </a>
                                    <a class="dropdown-item" href="">
                                        <i class="fa fa-truck" aria-hidden="true"></i>My Orders
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>{{__('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </span>
                            <span class="dropdown">
                                <i class="fa fa-shopping-cart dropdown-toggle" class="dropdown-toggle" href="#"
                                    data-toggle="dropdown" id="navbarDropdown2" role="button" aria-haspopup="true"
                                    aria-expanded="false" aria-hidden="true"></i>
                                <div class="dropdown-menu shopping-cart" aria-labelledby="navbarDropdown2">
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
                                                    BD{{$dish->where('id', $carts->dishid)->first()->price}}</div>
                                                <div class="cart-remove"><i class="fa fa-times" aria-hidden="true"
                                                        id="{{$carts->id}}"></i>
                                                </div>

                                            </div>
                                        </li>
                                        @endforeach

                                    </span>
                                    <div class="cart-footer">
                                        <div class="cart-total-price">
                                            <div class="sub-total">Sub-Total <b>BD2000</b></div>
                                            <div class="total">Total <b>BD3000</b></div>
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
                    @endguest
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
                <input type="hidden" value="" name="subscribe_name" id="subscribe_name">
                <a class="button btn btn-primary" onclick="email_subscribe()"><span>subscribe</span><i
                        class="fa fa-paper-plane"></i></a>

            </form>
        </div>
        <section id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <h5>Quick links</h5>
                        <ul class="list-unstyled quick-links">
                            <li><a href="https://www.fiverr.com/share/qb8D02">Home</a></li>
                            <li><a href="https://www.fiverr.com/share/qb8D02">About</a></li>
                            <li><a href="https://www.fiverr.com/share/qb8D02">FAQ</a></li>
                            <li><a href="https://www.fiverr.com/share/qb8D02">Get Started</a></li>
                            <li><a href="https://www.fiverr.com/share/qb8D02">Videos</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <h5>Quick links</h5>
                        <ul class="list-unstyled quick-links">
                            <li><a href="https://www.fiverr.com/share/qb8D02">Home</a></li>
                            <li><a href="https://www.fiverr.com/share/qb8D02">About</a></li>
                            <li><a href="https://www.fiverr.com/share/qb8D02">FAQ</a></li>
                            <li><a href="https://www.fiverr.com/share/qb8D02">Get Started</a></li>
                            <li><a href="https://www.fiverr.com/share/qb8D02">Videos</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <h5>Quick links</h5>
                        <ul class="list-unstyled quick-links">
                            <li><a href="https://www.fiverr.com/share/qb8D02">Home</a></li>
                            <li><a href="https://www.fiverr.com/share/qb8D02">About</a></li>
                            <li><a href="https://www.fiverr.com/share/qb8D02">FAQ</a></li>
                            <li><a href="https://www.fiverr.com/share/qb8D02">Get Started</a></li>
                            <li><a href="https://www.fiverr.com/share/qb8D02">Videos</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <h5>Quick links</h5>
                        <ul class="list-unstyled quick-links">
                            <li><a href="https://www.fiverr.com/share/qb8D02">Home</a></li>
                            <li><a href="https://www.fiverr.com/share/qb8D02">About</a></li>
                            <li><a href="https://www.fiverr.com/share/qb8D02">FAQ</a></li>
                            <li><a href="https://www.fiverr.com/share/qb8D02">Get Started</a></li>
                            <li><a href="https://www.fiverr.com/share/qb8D02">Videos</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                        <ul class="list-unstyled list-inline social text-center">
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i
                                        class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i
                                        class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"
                                    target="_blank"><i class="fa fa-envelope"></i></a></li>
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