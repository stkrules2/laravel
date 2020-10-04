<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kabab House</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,500,600,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Muli:400,600,700,800,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                    <a href="#"><img src="{{ URL::to('img/logo/kabab-house-logo-org.png') }}" alt="Kabab House" class="logo"></a>
                </div>
                <div class="menu-icons">

                    <a class="btn collapse-btn" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="float:left;font-size:23px">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>

                    <ul class="menu-list collapse" id="collapseExample">
                        @if(isset($category))
                        <?php $count = 0 ?>
                        @foreach($category as $cat)

                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navbarDropdown2" role="button" aria-haspopup="true" aria-expanded="false"> {{$cat->title}} </a>
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
                        <?php $count = $count + 1 ?>
                        @if($count === 5)
                        @break
                        @endif
                        @endforeach

                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navbarDropdown2" role="button" aria-haspopup="true" aria-expanded="false"> More </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                @if($count === 5)
                                @foreach($category as $cat2)
                                <?php $count = $count - 1 ?>
                                @if($count < 0) <a href="#" class="dropdown-item">{{$cat2->title}}</a>
                                    @endif
                                    @endforeach
                                    @endif

                            </div>
                        </li>
                        @endif
                    </ul>

                    <div class="icons">
                        <span class="icons-span">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class='badge' id='lblCartCount'>0</span>

                        </span>

                    </div>

            </nav>
        </header>


        <main>

            @yield('content')
        </main>


    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{ URL::to('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            const $dropdown = $(".dropdown");
            const $dropdownToggle = $(".dropdown-toggle");
            const $dropdownMenu = $(".dropdown-menu");
            const showClass = "show";
            $(window).on("load resize", function() {
                if (this.matchMedia("(min-width: 768px)").matches) {
                    $dropdown.hover(
                        function() {
                            const $this = $(this);
                            $this.addClass(showClass);
                            $this.find($dropdownToggle).attr("aria-expanded", "true");
                            $this.find($dropdownMenu).addClass(showClass);
                        },
                        function() {
                            const $this = $(this);
                            $this.removeClass(showClass);
                            $this.find($dropdownToggle).attr("aria-expanded", "false");
                            $this.find($dropdownMenu).removeClass(showClass);
                        }
                    );
                } else {
                    $dropdown.off("mouseenter mouseleave");
                }
            });

            $("#news-slider10").owlCarousel({
                items: 4,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [980, 2],
                itemsMobile: [600, 2],
                loop: true,
                lazyLoad: true,
                autoWidth: true,
                margin: 20,
                dots: false,
                autoplay: true,
                autoplayTimeout: 4000
            });


            $(".categories-product-carousel").owlCarousel({
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [980, 2],
                itemsMobile: [600, 1],
                loop: true,
                margin: 30,
                lazyLoad: true,
                autoWidth: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 4000,
            });
            $(".carousel2").owlCarousel({
                items: 4,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [980, 2],
                itemsMobile: [600, 1],
                loop: true,
                lazyLoad: true,
                autoWidth: true,
                margin: 20,
                dots: false,
                autoplay: true,
                autoplayTimeout: 4000

            });


            $(window).scroll(function() {
                var $win = $(window);
                var $checkWidth = $win.width();
                if ($checkWidth > 1160) {
                    var sticky = $('header'),
                        scroll = $(window).scrollTop();
                    if (scroll >= 40) {
                        sticky.addClass('fixed');
                    } else {
                        sticky.removeClass('fixed');
                    }
                }
            });
            $('.banner-carousel').owlCarousel({
                loop: true,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        });
    </script>
</body>

</html>