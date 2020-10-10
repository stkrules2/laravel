$(document).ready(function () {


    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";
    $('#orders-table').DataTable();
    $(window).on("load resize", function () {
        if (this.matchMedia("(min-width: 768px)").matches) {
            $dropdown.hover(
                function () {
                    const $this = $(this);
                    $this.addClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "true");
                    $this.find($dropdownMenu).addClass(showClass);
                },
                function () {
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

    var owl = $("#news-slider10").owlCarousel({

        loop: false,
        rewind: true,
        lazyLoad: true,
        autoWidth: true,
        margin: 0,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000
    });


    $(".categories-product-carousel").owlCarousel({
        items: 3,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [980, 2],
        itemsMobile: [600, 1],
        loop: false,
        margin: 10,
        rewind: true,
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
        loop: false,
        rewind: true,
        lazyLoad: true,
        autoWidth: true,
        margin: 20,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000

    });


    $(window).scroll(function () {
        var $win = $(window);
        var $checkWidth = $win.width();
        if ($checkWidth > 1160) {
            var sticky = $('header'),
                scroll = $(window).scrollTop();
            if (scroll >= 240) {
                sticky.addClass('fixed');
            } else {
                sticky.removeClass('fixed');
            }
        }
    });
    $('.banner-carousel').owlCarousel({
        loop: false,
        rewind: true,
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
    });

    $('.content-tabs-ul a').on('click', function () {
        $('.content-tabs-ul li').removeClass('active');
        $(this).parent().addClass('active');
        var categoryid = $(this).attr('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/dishes/show',
            type: "post",
            data: {
                'categoryid': categoryid,
            },
            success: function (response) {

                // $('#news-slider10').empty();
                var count = $('#news-slider10 .owl-item').length;
                for (i = 0; i < count; i++) {
                    $('#news-slider10').trigger('remove.owl.carousel', i).trigger('refresh.owl.carousel');
                }
                for (var i = 0; i < response.length; i++) {

                    if (response[i].image2) {
                        if (response[i].before_discount_price) {
                            $('#news-slider10').owlCarousel('add', '<div class="post-slide10"><div class="custom-card"><a href="#"><img class="image_thumb" src="../storage/' + response[i].image1 + '" title="' + response[i].name + '" alt="' + response[i].name + '"><img class="img-top" src="../storage/' + response[i].image2 + '" title="' + response[i].name + '" alt="' + response[i].name + '"></a><button class="btn card-img-btn" id="' + response[i].id + '"><i  class="fa fa-eye"></i>&nbsp;&nbsp;Quick View</button><div class="card-text"><a href="#"><h4>' + response[i].name + '</h4></a></div><div class="price"><span class="price-new">BD&nbsp;' + response[i].price.toFixed(2) + '</span><span class="price-old">BD&nbsp;' + response[i].before_discount_price.toFixed(2) + '</span></div><div class="button-group"><button class="btn btn-wishlist" title="Add to wishlist" id="' + response[i].id + '"><i class="fa fa-heart"></i> <span title="Add to wishlist"></span></button><button class="btn btn-cart " type="button" title="Add to Cart" id="' + response[i].id + '"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button><button class="btn btn-compare" title="Add to Compare" id="' + response[i].id + '"><i class="fa fa-bar-chart" aria-hidden="true"></i> <span title="Add to Compare"></span></button></div></div></div>').owlCarousel('update');
                        } else {
                            $('#news-slider10').owlCarousel('add', '<div class="post-slide10"><div class="custom-card"><a href="#"><img class="image_thumb" src="../storage/' + response[i].image1 + '" title="' + response[i].name + '" alt="' + response[i].name + '"><img class="img-top" src="../storage/' + response[i].image2 + '" title="' + response[i].name + '" alt="' + response[i].name + '"></a><button class="btn card-img-btn" id="' + response[i].id + '"><i  class="fa fa-eye"></i>&nbsp;&nbsp;Quick View</button><div class="card-text"><a href="#"><h4>' + response[i].name + '</h4></a></div><div class="price"><span class="price-new">BD&nbsp;' + response[i].price.toFixed(2) + '</span></div><div class="button-group"><button class="btn btn-wishlist" title="Add to wishlist" id="' + response[i].id + '"><i class="fa fa-heart"></i> <span title="Add to wishlist"></span></button><button class="btn btn-cart " type="button" title="Add to Cart" id="' + response[i].id + '"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button><button class="btn btn-compare" title="Add to Compare" id="' + response[i].id + '"><i class="fa fa-bar-chart" aria-hidden="true"></i> <span title="Add to Compare"></span></button></div></div></div>').owlCarousel('update');
                        }
                    } else {
                        if (response[i].before_discount_price) {
                            $('#news-slider10').owlCarousel('add', '<div class="post-slide10"><div class="custom-card"><a href="#"><img class="image_thumb" src="../storage/' + response[i].image1 + '" title="' + response[i].name + '" alt="' + response[i].name + '"</a><button class="btn card-img-btn" id="' + response[i].id + '"><i  class="fa fa-eye"></i>&nbsp;&nbsp;Quick View</button><div class="card-text"><a href="#"><h4>' + response[i].name + '</h4></a></div><div class="price"><span class="price-new">BD&nbsp;' + response[i].price.toFixed(2) + '</span><span class="price-old">BD&nbsp;' + response[i].before_discount_price.toFixed(2) + '</span></div><div class="button-group"><button class="btn btn-wishlist" title="Add to wishlist" id="' + response[i].id + '"><i class="fa fa-heart"></i> <span title="Add to wishlist"></span></button><button class="btn btn-cart " type="button" title="Add to Cart" id="' + response[i].id + '"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button><button class="btn btn-compare" title="Add to Compare" id="' + response[i].id + '"><i class="fa fa-bar-chart" aria-hidden="true"></i> <span title="Add to Compare"></span></button></div></div></div>').owlCarousel('update');

                        } else {
                            $('#news-slider10').owlCarousel('add', ' <div class="post-slide10"><div class="custom-card"><a href="#"><img class="image_thumb" src="../storage/' + response[i].image1 + '" title="' + response[i].name + '" alt="' + response[i].name + '"></a><button class="btn card-img-btn" id="' + response[i].id + '"><i  class="fa fa-eye"></i>&nbsp;&nbsp;Quick View</button><div class="card-text"><a href="#"><h4>' + response[i].name + '</h4></a></div><div class="price"><span class="price-new">BD&nbsp;' + response[i].price.toFixed(2) + '</span></div><div class="button-group"><button class="btn btn-wishlist" title="Add to wishlist" id="' + response[i].id + '"><i class="fa fa-heart"></i> <span title="Add to wishlist"></span></button><button class="btn btn-cart " type="button" title="Add to Cart" id="' + response[i].id + '"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button><button class="btn btn-compare" title="Add to Compare" id="' + response[i].id + '"><i class="fa fa-bar-chart" aria-hidden="true"></i> <span title="Add to Compare"></span></button></div></div></div>').owlCarousel('update');

                        }
                    }


                }

            }
        });


    });

    function isJson(str) {
        try {
            return JSON.parse(str);
        } catch (e) {
            return false;
        }
    }
});