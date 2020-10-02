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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                    <a href="#"><img src="{{ URL::to('img/logo/kabab-house-logo-org.png') }}" alt="Kabab House"
                            class="logo"></a>
                </div>
                <div class="menu-icons">

                    <a class="btn collapse-btn" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                        aria-controls="collapseExample" style="float:left;font-size:23px">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>

                    <ul class="menu-list collapse" id="collapseExample">
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navbarDropdown2"
                                role="button" aria-haspopup="true" aria-expanded="false"> Bahraini&nbsp;Grills </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">

                                <a href="#" class="dropdown-item">Bahraini Meat Kabab</a>
                                <a href="#" class="dropdown-item">Bahraini Chicken Kabab</a>
                                <a href="#" class="dropdown-item">Bahraini Meat Tikka</a>
                                <a href="#" class="dropdown-item">Bahraini Chicken Tikka</a>
                                <a href="#" class="dropdown-item">Bahraini Meat Yogurt Tikka</a>
                                <a href="#" class="dropdown-item">Chicken Tikka Breast</a>
                                <a href="#" class="dropdown-item">Chicken Tikka Leg</a>
                                <a href="#" class="dropdown-item">Mixed Grill</a>
                                <a href="#" class="dropdown-item">Liver Fry</a>

                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navbarDropdown2"
                                role="button" aria-haspopup="true" aria-expanded="false"> Turkish & Persian Grills </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">

                                <a href="#" class="dropdown-item">Shish Taouk</a>
                                <a href="#" class="dropdown-item">Chicken Adana Kabab</a>
                                <a href="#" class="dropdown-item">Mutton Adana Kabab</a>
                                <a href="#" class="dropdown-item">Lamb Chops</a>
                                <a href="#" class="dropdown-item">JoJo Kabab Mutton</a>
                                <a href="#" class="dropdown-item">JoJo Kabab Chicken</a>
                                <a href="#" class="dropdown-item">Arayes Mutton</a>
                                <a href="#" class="dropdown-item">Arayes Chicken</a>
                                <a href="#" class="dropdown-item">Chullu Kabab Mutton</a>
                                <a href="#" class="dropdown-item">Chullu Kabab Chicken</a>
                                <a href="#" class="dropdown-item">Chicken Wings Grill</a>
                                <a href="#" class="dropdown-item">Hamour Fish Grill</a>
                                <a href="#" class="dropdown-item">Pawn Grill</a>
                                <a href="#" class="dropdown-item">Mix Grill</a>

                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navbarDropdown2"
                                role="button" aria-haspopup="true" aria-expanded="false"> Indian & Pakistani Cuisine
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">

                                <a href="#" class="dropdown-item">Daal Chana</a>
                                <a href="#" class="dropdown-item">Daal Mash</a>
                                <a href="#" class="dropdown-item">Nehari</a>
                                <a href="#" class="dropdown-item">Chicken Korma</a>
                                <a href="#" class="dropdown-item">Chicken Karahi</a>
                                <a href="#" class="dropdown-item">Mutton Karahi</a>
                                <a href="#" class="dropdown-item">Salad</a>
                                <a href="#" class="dropdown-item">Raita</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navbarDropdown2"
                                role="button" aria-haspopup="true" aria-expanded="false">
                                Appetizers </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">

                                <a href="#" class="dropdown-item">Hummus</a>
                                <a href="#" class="dropdown-item">Mutabbel</a>
                                <a href="#" class="dropdown-item">Taboulah</a>
                                <a href="#" class="dropdown-item">Yogurt with Cucumber</a>
                                <a href="#" class="dropdown-item">Mix Appetizers</a>

                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navbarDropdown2"
                                role="button" aria-haspopup="true" aria-expanded="false"> Sweets </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">

                                <a href="#" class="dropdown-item">Careem Caramel</a>

                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navbarDropdown2"
                                role="button" aria-haspopup="true" aria-expanded="false"> More </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">

                                <a href="#" class="dropdown-item">Indian & Pakistani Grills</a>
                                <a href="#" class="dropdown-item">Rice Dishes</a>
                                <a href="#" class="dropdown-item">Drinks</a>

                            </div>
                        </li>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
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