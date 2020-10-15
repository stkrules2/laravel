$(document).ready(function () {
    $("#newsletter-modal").modal("show");
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";
    $("#orders-table").DataTable();
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

    $("#news-slider10").owlCarousel({
        loop: false,
        rewind: true,
        lazyLoad: true,
        autoWidth: true,
        margin: 0,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
    });

    $(".categories-product-carousel").owlCarousel({
        items: 3,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [980, 2],
        itemsMobile: [600, 1],
        loop: false,
        margin: 20,
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
        autoplayTimeout: 4000,
    });

    $(window).scroll(function () {
        var $win = $(window);
        var $checkWidth = $win.width();
        if ($checkWidth > 1160) {
            var sticky = $("header"),
                scroll = $(window).scrollTop();
            if (scroll >= 240) {
                sticky.addClass("fixed");
            } else {
                sticky.removeClass("fixed");
            }
        }
    });
    $(".banner-carousel").owlCarousel({
        loop: false,
        rewind: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });

    $(".content-tabs-ul a").on("click", function () {
        $(".content-tabs-ul li").removeClass("active");
        $(this).parent().addClass("active");
        var categoryid = $(this).attr("id");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/dishes/show",
            type: "post",
            data: {
                categoryid: categoryid,
            },
            success: function (response) {
                // $('#news-slider10').empty();
                var count = $("#news-slider10 .owl-item").length;
                for (i = 0; i < count; i++) {
                    $("#news-slider10")
                        .trigger("remove.owl.carousel", i)
                        .trigger("refresh.owl.carousel");
                }
                for (var i = 0; i < response.length; i++) {
                    if (response[i].image2) {
                        if (response[i].before_discount_price) {
                            $("#news-slider10")
                                .owlCarousel(
                                    "add",
                                    '<div class="post-slide10"><div class="custom-card"><a href="#"><img class="image_thumb" src="../storage/' +
                                        response[i].image1 +
                                        '" title="' +
                                        response[i].name +
                                        '" alt="' +
                                        response[i].name +
                                        '"><img class="img-top" src="../storage/' +
                                        response[i].image2 +
                                        '" title="' +
                                        response[i].name +
                                        '" alt="' +
                                        response[i].name +
                                        '"></a><button class="btn card-img-btn" id="' +
                                        response[i].id +
                                        '"><i  class="fa fa-eye"></i>&nbsp;&nbsp;Quick View</button><div class="card-text"><a href="#"><h4>' +
                                        response[i].name +
                                        '</h4></a></div><div class="price"><span class="price-new">BD&nbsp;' +
                                        response[i].price.toFixed(2) +
                                        '</span><span class="price-old">BD&nbsp;' +
                                        response[
                                            i
                                        ].before_discount_price.toFixed(2) +
                                        '</span></div><div class="button-group"><button class="btn btn-wishlist add-to-wishlist add-to-wishlist" title="Add to wishlist" id="' +
                                        response[i].id +
                                        '"><i class="fa fa-heart"></i> <span title="Add to wishlist"></span></button><button class="btn btn-cart add-to-cart" type="button" title="Add to Cart" id="' +
                                        response[i].id +
                                        '"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button><button class="btn btn-compare" title="Add to Compare" id="' +
                                        response[i].id +
                                        '"><i class="fa fa-bar-chart" aria-hidden="true"></i> <span title="Add to Compare"></span></button></div></div></div>'
                                )
                                .owlCarousel("update");
                        } else {
                            $("#news-slider10")
                                .owlCarousel(
                                    "add",
                                    '<div class="post-slide10"><div class="custom-card"><a href="#"><img class="image_thumb" src="../storage/' +
                                        response[i].image1 +
                                        '" title="' +
                                        response[i].name +
                                        '" alt="' +
                                        response[i].name +
                                        '"><img class="img-top" src="../storage/' +
                                        response[i].image2 +
                                        '" title="' +
                                        response[i].name +
                                        '" alt="' +
                                        response[i].name +
                                        '"></a><button class="btn card-img-btn" id="' +
                                        response[i].id +
                                        '"><i  class="fa fa-eye"></i>&nbsp;&nbsp;Quick View</button><div class="card-text"><a href="#"><h4>' +
                                        response[i].name +
                                        '</h4></a></div><div class="price"><span class="price-new">BD&nbsp;' +
                                        response[i].price.toFixed(2) +
                                        '</span></div><div class="button-group"><button class="btn btn-wishlist add-top-wishlist add-to-wishlist" title="Add to wishlist" id="' +
                                        response[i].id +
                                        '"><i class="fa fa-heart"></i> <span title="Add to wishlist"></span></button><button class="btn btn-cart add-to-cart" type="button" title="Add to Cart" id="' +
                                        response[i].id +
                                        '"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button><button class="btn btn-compare" title="Add to Compare" id="' +
                                        response[i].id +
                                        '"><i class="fa fa-bar-chart" aria-hidden="true"></i> <span title="Add to Compare"></span></button></div></div></div>'
                                )
                                .owlCarousel("update");
                        }
                    } else {
                        if (response[i].before_discount_price) {
                            $("#news-slider10")
                                .owlCarousel(
                                    "add",
                                    '<div class="post-slide10"><div class="custom-card"><a href="#"><img class="image_thumb" src="../storage/' +
                                        response[i].image1 +
                                        '" title="' +
                                        response[i].name +
                                        '" alt="' +
                                        response[i].name +
                                        '"</a><button class="btn card-img-btn" id="' +
                                        response[i].id +
                                        '"><i  class="fa fa-eye"></i>&nbsp;&nbsp;Quick View</button><div class="card-text"><a href="#"><h4>' +
                                        response[i].name +
                                        '</h4></a></div><div class="price"><span class="price-new">BD&nbsp;' +
                                        response[i].price.toFixed(2) +
                                        '</span><span class="price-old">BD&nbsp;' +
                                        response[
                                            i
                                        ].before_discount_price.toFixed(2) +
                                        '</span></div><div class="button-group"><button class="btn btn-wishlist add-to-wishlist" title="Add to wishlist" id="' +
                                        response[i].id +
                                        '"><i class="fa fa-heart"></i> <span title="Add to wishlist"></span></button><button class="btn btn-cart add-to-cart" type="button" title="Add to Cart" id="' +
                                        response[i].id +
                                        '"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button><button class="btn btn-compare" title="Add to Compare" id="' +
                                        response[i].id +
                                        '"><i class="fa fa-bar-chart" aria-hidden="true"></i> <span title="Add to Compare"></span></button></div></div></div>'
                                )
                                .owlCarousel("update");
                        } else {
                            $("#news-slider10")
                                .owlCarousel(
                                    "add",
                                    ' <div class="post-slide10"><div class="custom-card"><a href="#"><img class="image_thumb" src="../storage/' +
                                        response[i].image1 +
                                        '" title="' +
                                        response[i].name +
                                        '" alt="' +
                                        response[i].name +
                                        '"></a><button class="btn card-img-btn" id="' +
                                        response[i].id +
                                        '"><i  class="fa fa-eye"></i>&nbsp;&nbsp;Quick View</button><div class="card-text"><a href="#"><h4>' +
                                        response[i].name +
                                        '</h4></a></div><div class="price"><span class="price-new">BD&nbsp;' +
                                        response[i].price.toFixed(2) +
                                        '</span></div><div class="button-group"><button class="btn btn-wishlist add-to-wishlist" title="Add to wishlist" id="' +
                                        response[i].id +
                                        '"><i class="fa fa-heart"></i> <span title="Add to wishlist"></span></button><button class="btn btn-cart add-to-cart" type="button" title="Add to Cart" id="' +
                                        response[i].id +
                                        '"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button><button class="btn btn-compare" title="Add to Compare" id="' +
                                        response[i].id +
                                        '"><i class="fa fa-bar-chart" aria-hidden="true"></i> <span title="Add to Compare"></span></button></div></div></div>'
                                )
                                .owlCarousel("update");
                        }
                    }
                }
            },
        });
    });

    $("#account-edit-form").on("submit", function (e) {
        e.preventDefault();
        formdata = new FormData(this);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/user/edit",
            type: "post",
            data: formdata,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                swal(
                    "Congratulations!",
                    "Your data has been updated!",
                    "success"
                );
                $(".number-error").hide();
                $(".name-error").hide();
            },
            error: function (xhr) {
                if (xhr.responseJSON.errors.fullname) {
                    $(".name-error").show();
                    $(".name-error").html(xhr.responseJSON.errors.fullname[0]);
                } else {
                    $(".name-error").hide();
                }
                if (xhr.responseJSON.errors.telephone) {
                    $(".number-error").show();
                    $(".number-error").html(
                        xhr.responseJSON.errors.telephone[0]
                    );
                } else {
                    $(".number-error").hide();
                }
            },
        });
    });
    $("#password-change-form").on("submit", function (e) {
        e.preventDefault();
        formdata = new FormData(this);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/user/change/password",
            type: "post",
            data: formdata,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                swal(
                    "Congratulations!",
                    "Your password has been updated!",
                    "success"
                );
                $(".current_password_error").hide();
                $(".new_password_error").hide();
                $(".confirm_password_error").hide();
            },
            error: function (xhr) {
                if (xhr.responseJSON) {
                    if (xhr.responseJSON.errors) {
                        if (xhr.responseJSON.errors) {
                            $(".current_password_error").show();
                            $(".current_password_error").html(
                                xhr.responseJSON.errors
                            );
                        } else {
                            $(".current_password_error").hide();
                        }
                    } else {
                        if (xhr.responseJSON.error.current_password) {
                            $(".current_password_error").show();
                            $(".current_password_error").html(
                                xhr.responseJSON.error.current_password[0]
                            );
                        } else {
                            $(".current_password_error").hide();
                        }
                    }
                    if (xhr.responseJSON.error.new_password) {
                        $(".new_password_error").show();
                        $(".new_password_error").html(
                            xhr.responseJSON.error.new_password[0]
                        );
                    } else {
                        $(".new_password_error").hide();
                    }
                    if (xhr.responseJSON.error.confirm_password) {
                        $(".confirm_password_error").show();
                        $(".confirm_password_error").html(
                            xhr.responseJSON.error.confirm_password[0]
                        );
                    } else {
                        $(".confirm_password_error").hide();
                    }
                }
            },
        });
    });
    $("#new-address-form").on("submit", function (e) {
        e.preventDefault();
        formdata = new FormData(this);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/user/add/address",
            type: "post",
            data: formdata,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                swal(
                    "Congratulations!",
                    "Your address has been added!",
                    "success"
                );
                $(".name-error").hide();
                $(".address-error").hide();
                $(".post-error").hide();
            },
            error: function (xhr) {
                if (xhr.responseJSON) {
                    if (xhr.responseJSON.errors.fullname) {
                        $(".name-error").show();
                        $(".name-error").html(
                            xhr.responseJSON.errors.fullname[0]
                        );
                    } else {
                        $(".name-error").hide();
                    }

                    if (xhr.responseJSON.errors.address) {
                        $(".address-error").show();
                        $(".address-error").html(
                            xhr.responseJSON.errors.address[0]
                        );
                    } else {
                        $(".address-error").hide();
                    }
                    if (xhr.responseJSON.errors.postcode) {
                        $(".post-error").show();
                        $(".post-error").html(
                            xhr.responseJSON.errors.postcode[0]
                        );
                    } else {
                        $(".post-error").hide();
                    }
                }
            },
        });
    });
    $(".delete-address").on("click", function (e) {
        var table = $(this).parent().parent().parent().parent();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/user/delete/address" + e.target.id + "",
            type: "get",
            success: function (response) {
                table.remove();
                $("#address .table-responsive").append(
                    "<p>Your address book entries are empty </p>"
                );
            },
        });
    });
    $(document).on(
        "click",
        ".post-slide10 .custom-card .button-group .btn.btn-wishlist.add-to-wishlist",
        function (e) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/user/add/wishlist" + e.currentTarget.id + "",
                type: "get",
                success: function (response) {
                    if (response) {
                        swal(
                            "Success!",
                            "Dish is added to your wishlist!",
                            "success"
                        );
                    } else {
                        swal(
                            "Error occurred!",
                            "This dish might already be in your wishlist!",
                            "error"
                        );
                    }
                },
                error: function (xhr) {
                    swal(
                        "Error occurred!",
                        "This dish might already be in your wishlist!",
                        "error"
                    );
                },
            });
        }
    );

    $("#wishlist .btn-primary").on("click", function (e) {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/user/add/cart" + e.currentTarget.id + "",
            type: "get",
            success: function (response) {
                $(".shopping-cart span").empty();
                for (var i = 0; i < response[0].length; i++) {
                    for (var j = 0; j < response[1].length; j++) {
                        if (response[0][i].dishid == response[1][j].id) {
                            $(".shopping-cart span").append(
                                '<li class="cart-product"><div class="cart-list"><div class="cart-img"><img src="../storage/' +
                                    response[1][j].image1 +
                                    '" alt="' +
                                    response[1][j].name +
                                    '" title="' +
                                    response[1][j].name +
                                    '"></div><div class="cart-name"><a href="#">' +
                                    response[1][j].name +
                                    '</a></div><div class="cart-number">x <br>' +
                                    response[0][i].countdish +
                                    ' </div><div class="cart-price">BD' +
                                    response[1][j].price.toFixed(2) +
                                    '</div><div class="cart-remove"><i class="fa fa-times" aria-hidden="true" id="' +
                                    response[0][i].id +
                                    '"></i></div></div></li>'
                            );
                            $("#lblCartCount").empty();
                            $("#lblCartCount").text(response[0].length);
                        }
                    }
                }
                $(".cart-total-price .total b").empty();
                $(".cart-total-price .total b").append(
                    "BD " + response[2].toFixed(2)
                );
                $(".shopping-cart .empty-cart-list").remove();
                if (response[0].length == 1) {
                    $(".shopping-cart span").css("display", "inline-block");
                    $(".cart-footer").remove();
                    $(".shopping-cart").append(
                        ' <div class="cart-footer"><div class="cart-total-price"><div class="total">Total <b>BD ' +
                            response[2].toFixed(2) +
                            '</b></div></div><div class="dropdown-divider"></div><p class="text-right"><a href="/mycart" class="btn"><strong>View Cart</strong></a><a href="/checkout"class="btn"><strong>Checkout</strong></a></p></div>'
                    );
                }
                $.notify("Added to Cart", "success");
            },
        });
    });

    $(document).on(
        "click",
        ".post-slide10 .custom-card .button-group .btn.btn-cart.add-to-cart",
        function (e) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/user/add/cart" + e.currentTarget.id + "",
                type: "get",
                success: function (response) {
                    $(".shopping-cart span").empty();
                    for (var i = 0; i < response[0].length; i++) {
                        for (var j = 0; j < response[1].length; j++) {
                            if (response[0][i].dishid == response[1][j].id) {
                                $(".shopping-cart span").append(
                                    '<li class="cart-product"><div class="cart-list"><div class="cart-img"><img src="../storage/' +
                                        response[1][j].image1 +
                                        '" alt="' +
                                        response[1][j].name +
                                        '" title="' +
                                        response[1][j].name +
                                        '"></div><div class="cart-name"><a href="#">' +
                                        response[1][j].name +
                                        '</a></div><div class="cart-number">x <br>' +
                                        response[0][i].countdish +
                                        ' </div><div class="cart-price">BD' +
                                        response[1][j].price.toFixed(2) +
                                        '</div><div class="cart-remove"><i class="fa fa-times" aria-hidden="true" id="' +
                                        response[0][i].id +
                                        '"></i></div></div></li>'
                                );
                                $("#lblCartCount").empty();
                                $("#lblCartCount").text(response[0].length);
                            }
                        }
                    }
                    $(".cart-total-price .total b").empty();
                    $(".cart-total-price .total b").append(
                        "BD " + response[2].toFixed(2)
                    );
                    $(".shopping-cart .empty-cart-list").remove();
                    if (response[0].length == 1) {
                        $(".shopping-cart span").css("display", "inline-block");
                        $(".cart-footer").remove();
                        $(".shopping-cart").append(
                            ' <div class="cart-footer"><div class="cart-total-price"><div class="total">Total <b>BD ' +
                                response[2].toFixed(2) +
                                '</b></div></div><div class="dropdown-divider"></div><p class="text-right"><a href="/mycart" class="btn"><strong>View Cart</strong></a><a href="/checkout"class="btn"><strong>Checkout</strong></a></p></div>'
                        );
                    }
                    $.notify("Added to Cart", "success");
                },
            });
        }
    );
    $(".shopping-cart").on("click", ".cart-remove i", function (e) {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/user/remove/cart" + e.target.id + "",
            type: "get",
            success: function (response) {
                $(".shopping-cart span").empty();
                for (var i = 0; i < response[0].length; i++) {
                    for (var j = 0; j < response[1].length; j++) {
                        if (response[0][i].dishid == response[1][j].id) {
                            $(".shopping-cart span").append(
                                '<li class="cart-product"><div class="cart-list"><div class="cart-img"><img src="../storage/' +
                                    response[1][j].image1 +
                                    '" alt="' +
                                    response[1][j].name +
                                    '" title="' +
                                    response[1][j].name +
                                    '"></div><div class="cart-name"><a href="#">' +
                                    response[1][j].name +
                                    '</a></div><div class="cart-number">x <br> ' +
                                    response[0][i].countdish +
                                    ' </div><div class="cart-price">' +
                                    response[1][j].price.toFixed(2) +
                                    '</div><div class="cart-remove"><i class="fa fa-times" aria-hidden="true" id="' +
                                    response[0][i].id +
                                    '"></i></div></div></li>'
                            );
                            $("#lblCartCount").empty();
                            $("#lblCartCount").text(response[0].length);
                        }
                    }
                }
                $(".cart-total-price .total b").empty();
                $(".cart-total-price .total b").append(
                    "BD " + response[2].toFixed(2)
                );
                if (response[0].length == 0) {
                    $(".shopping-cart .cart-footer").remove();
                    $(".shopping-cart span").css("display", "inherit");
                    $(".shopping-cart").append(
                        " <li class='empty-cart-list'><p>Your shopping cart is empty!</p></li>"
                    );
                    $("#lblCartCount").empty();
                    $("#lblCartCount").text(response[0].length);
                }
            },
        });
    });

    $(document).on("click", ".refresh-cart", function (e) {
        console.log();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url:
                "/user/refresh/count" +
                e.currentTarget.id +
                "" +
                $(e.currentTarget).parent().siblings(".cart-dish-count").val(),
            type: "get",
            success: function (response) {
                location.reload(true);
            },
        });
    });
    $("#subscribe").on("submit", function (e) {
        e.preventDefault();
        if (isEmail($("#subscribe_email").val())) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/user/add/email",
                type: "post",
                data: {
                    email: $("#subscribe_email").val(),
                },
                success: function (response) {
                    if (response) {
                        swal(
                            "Congratulations!",
                            "Email has been added!",
                            "success"
                        );
                    } else {
                        swal("Error!", "Email already exists!", "error");
                    }
                },
            });
        } else {
            swal("Error!", "Please enter a valid email address!", "error");
        }
    });
    $("#subscribe_popup").on("submit", function (e) {
        e.preventDefault();
        if (isEmail($("#subscribe_pemail").val())) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/user/add/email",
                type: "post",
                data: {
                    email: $("#subscribe_pemail").val(),
                },
                success: function (response) {
                    if (response) {
                        swal(
                            "Congratulations!",
                            "Email has been added!",
                            "success"
                        );
                    } else {
                        swal("Error!", "Email already exists!", "error");
                    }
                },
            });
        } else {
            swal("Error!", "Please enter a valid email address!", "error");
        }
    });
});
function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
