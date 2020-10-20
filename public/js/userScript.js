$(document).ready(function () {
    $(window).on("load", function () {
        $("#loading").hide();
    });
    $(".loader-container2").hide();
    $("#existing-payment-address-radio").on("change", function () {
        if ($("#existing-payment-address-radio").is(":checked")) {
            $(".alternate").show();
        } else {
            $(".alternate").hide();
        }
    });
    $("#button-payment-address").on("click", function () {
        address = $("#existing_address_id ").val();
        if (
            $("#existing_address_id").val() != "" &&
            $("#existing_address_id").val()
        ) {
            if ($("#existing-payment-address-radio").is(":checked")) {
                address =
                    $("#optional-fullname").val() +
                    ", " +
                    $("#optional-custom-address").val() +
                    ", " +
                    $("#optional-code").val();
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "/user/add/address",
                    type: "post",
                    data: {
                        fullname: $('#optional-fullname').val(),
                        address: $('#optional-custom-address').val(),
                        number: $('#optional-number').val(),
                        postcode: $('#optional-code').val(),
                    },
                    success: function (response) {
                        address = response;
                    },
                });
            }
        } else {
            address =
                $("#fullname").val() +
                ", " +
                $("#custom-address").val() +
                ", " +
                $("#custom-address").val();
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/user/add/address",
                type: "post",
                data: {
                    fullname: $('#fullname').val(),
                    address: $('#custom-address').val(),
                    number: $('#number').val(),
                    postcode: $('#code').val(),
                },
                success: function (response) {
                    address = response;
                },
            });
        }
        $("#collapse2").removeClass("show");
        $(".panel2 i").removeClass("fa-caret-down");
        $(".panel2 i").addClass("fa-check-circle");
        $(".collapse3").addClass("show");
        $(".panel3").css("pointer-events", "auto");
    });

    $("input[name=paymentRadios]").on("change", function () {
        if ($(this).val() == "Online Payment") {
            $(".payment-method").show();
            $("#button-payment-method").hide();
        } else {
            $(".payment-method").hide();
            $("#button-payment-method").show();
        }
    });
    $("#button-payment-method").on('click', function ()
    {
        $(".collapse3").removeClass("show");
        $(".panel3 i").removeClass("fa-caret-down");
        $(".panel3 i").addClass("fa-check-circle");
        $(".collapse4").addClass("show");
        $(".panel4").css("pointer-events", "auto");

        
    });
    $("#button-confirm-order").on('click', function ()
    {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            url: "/checkout/payment",
            type: "post",
            data: {
                cart: $(".cart").val(),
                address: address,
                cart: $(".cart").val(),
                method: "Cash on Delivery",
                price: $(".price").val(),
            },
            success: function (response) {
                window.location.href = "/home";
            },
        });

        
    });

    $(function () {
        $("form.require-validation").bind("submit", function (e) {
            var $form = $(e.target).closest("form"),
                inputSelector = [
                    "input[type=email]",
                    "input[type=password]",
                    "input[type=text]",
                    "input[type=file]",
                    "textarea",
                ].join(", "),
                $inputs = $form.find(".required").find(inputSelector),
                $errorMessage = $form.find("div.error"),
                valid = true;

            $errorMessage.addClass("hide");
            $(".has-error").removeClass("has-error");
            $inputs.each(function (i, el) {
                var $input = $(el);
                if ($input.val() === "") {
                    $input.parent().addClass("has-error");
                    $errorMessage.removeClass("hide");
                    e.preventDefault(); // cancel on first error
                }
            });
        });
    });
    $("#payment-form").on("submit", function (e) {
        if (!$("#payment-form").data("cc-on-file")) {
            e.preventDefault();
            Stripe.setPublishableKey(
                $("#payment-form").data("stripe-publishable-key")
            );
            Stripe.createToken(
                {
                    number: $(".card-number").val(),
                    cvc: $(".card-cvc").val(),
                    exp_month: $(".card-expiry-month").val(),
                    exp_year: $(".card-expiry-year").val(),
                },
                stripeResponseHandler
            );
        }
    });

    function stripeResponseHandler(status, response) {
        
        if (response.error) {
            $(".error").show().find(".alert").text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response["id"];

            // insert the token into the form so it gets submitted to the server
            $("#payment-form").find("input[type=text]").empty();

            $("#payment-form").append(
                "<input type='hidden' name='stripeToken' value='" +
                    token +
                    "'/>"
            );
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/checkout/payment",
                type: "post",
                data: {
                    number: $(".card-number").val(),
                    token: token,
                    cart: $(".cart").val(),
                    cvc: $(".card-cvc").val(),
                    exp_month: $(".card-expiry-month").val(),
                    exp_year: $(".card-expiry-year").val(),
                    address: address,
                    cart: $(".cart").val(),
                    method: "Online Payment",
                    price: $(".price").val(),
                },
                success: function (response) {},
            });
        }
    }
    if ($(window).width() <= 560) {
        $(".list-unstyled.quick-links").addClass("collapse");
        $(".list-unstyled.quick-links.link-1").attr("id", "demo1");
        $(".list-unstyled.quick-links.link-2").attr("id", "demo2");
        $(".list-unstyled.quick-links.link-3").attr("id", "demo3");
    }
    $(window).resize(function () {
        if ($(window).width() <= 560) {
            $(".list-unstyled.quick-links").addClass("collapse");
            $(".list-unstyled.quick-links.link-1").attr("id", "demo1");
            $(".list-unstyled.quick-links.link-2").attr("id", "demo2");
            $(".list-unstyled.quick-links.link-3").attr("id", "demo3");
        } else {
            $(".list-unstyled.quick-links").removeClass("collapse");
            $(".list-unstyled.quick-links.link-1").attr("id", "");
            $(".list-unstyled.quick-links.link-2").attr("id", "");
            $(".list-unstyled.quick-links.link-3").attr("id", "");
        }
    });
    if ($(window).width() > 848) {
        $("#newsletter-modal").modal("show");
    }
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
        items: 4,
        responsiveClass: true,
        responsive: {
            0: {
                autoWidth: true,
                items: 2,
            },
            600: {
                autoWidth: true,
                items: 3,
            },
            1000: {
                autoWidth: true,
                items: 4,
            },
            1300: {
                autoWidth: true,
                items: 4,
            },
        },
        loop: false,
        rewind: true,
        lazyLoad: true,
        margin: 10,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
    });

    $(".categories-product-carousel").owlCarousel({
        items: 3,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 2,
            },
            1300: {
                items: 3,
            },
        },
        loop: false,
        margin: 20,
        rewind: true,
        lazyLoad: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
    });
    $(".carousel2").owlCarousel({
        items: 4,
        responsiveClass: true,
        responsive: {
            0: {
                autoWidth: true,
                items: 2,
            },
            600: {
                autoWidth: true,
                items: 3,
            },
            1000: {
                autoWidth: true,
                items: 4,
            },
            1300: {
                autoWidth: true,
                items: 4,
            },
        },
        loop: false,
        rewind: true,
        lazyLoad: true,
        margin: 10,
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
        var newCat = categoryid.replace("categoryScroll", "");

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/dishes/show",
            type: "post",
            data: {
                categoryid: newCat,
            },
            success: function (response) {
                // $('#news-slider10').empty();
                var count = $("#news-slider10 .owl-item").length;
                for (i = 0; i < count; i++) {
                    $("#news-slider10")
                        .trigger("remove.owl.carousel", i)
                        .trigger("refresh.owl.carousel");
                }

                $(".loader-container2").show();
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
                                        '" data-toggle="modal" data-target="#dishModal"><i  class="fa fa-eye"></i>&nbsp;&nbsp;Quick View</button><div class="card-text"><a href="#"><h4>' +
                                        response[i].name +
                                        '</h4></a></div><div class="price"><span class="price-new">BD&nbsp;' +
                                        parseFloat(response[i].price).toFixed(
                                            3
                                        ) +
                                        '</span><span class="price-old">BD&nbsp;' +
                                        parseFloat(
                                            response[i].before_discount_price
                                        ).toFixed(3) +
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
                                        '" data-toggle="modal" data-target="#dishModal"><i  class="fa fa-eye"></i>&nbsp;&nbsp;Quick View</button><div class="card-text"><a href="#"><h4>' +
                                        response[i].name +
                                        '</h4></a></div><div class="price"><span class="price-new">BD&nbsp;' +
                                        parseFloat(response[i].price).toFixed(
                                            3
                                        ) +
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
                                        '" data-toggle="modal" data-target="#dishModal"><i  class="fa fa-eye"></i>&nbsp;&nbsp;Quick View</button><div class="card-text"><a href="#"><h4>' +
                                        response[i].name +
                                        '</h4></a></div><div class="price"><span class="price-new">BD&nbsp;' +
                                        parseFloat(response[i].price).toFixed(
                                            3
                                        ) +
                                        '</span><span class="price-old">BD&nbsp;' +
                                        parseFloat(
                                            response[i].before_discount_price
                                        ).toFixed(3) +
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
                                        '" data-toggle="modal" data-target="#dishModal"><i  class="fa fa-eye"></i>&nbsp;&nbsp;Quick View</button><div class="card-text"><a href="#"><h4>' +
                                        response[i].name +
                                        '</h4></a></div><div class="price"><span class="price-new">BD&nbsp;' +
                                        parseFloat(response[i].price).toFixed(
                                            3
                                        ) +
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

                $(".loader-container2").hide();
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
                            "This dish might already be in your wishlist or you need to login!",
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
    $(document).on(
        "click",
        ".carousel2 .custom-card .button-group .btn.btn-wishlist.add-to-wishlist",
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
                            "This dish might already be in your wishlist or you need to login!",
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
                                    parseFloat(response[1][j].price).toFixed(
                                        3
                                    ) +
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
                    "BD " + parseFloat(response[2]).toFixed(3)
                );
                $(".shopping-cart .empty-cart-list").remove();
                if (response[0].length == 1) {
                    $(".shopping-cart span").css("display", "inline-block");
                    $(".cart-footer").remove();
                    $(".shopping-cart").append(
                        ' <div class="cart-footer"><div class="cart-total-price"><div class="total">Total <b>BD ' +
                            parseFloat(response[2]).toFixed(3) +
                            '</b></div></div><div class="dropdown-divider"></div><p class="text-right"><a href="/mycart" class="btn"><strong>View Cart</strong></a><a href="/checkout"class="btn"><strong>Checkout</strong></a></p></div>'
                    );
                }
                $.notify("Added to Cart", "success");
            },
        });
    });

    $(document).on(
        "click",
        ".carousel2 .custom-card .button-group .btn.btn-cart.add-to-cart",
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
                                        parseFloat(
                                            response[1][j].price
                                        ).toFixed(3) +
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
                        "BD " + parseFloat(response[2]).toFixed(3)
                    );
                    $(".shopping-cart .empty-cart-list").remove();
                    if (response[0].length == 1) {
                        $(".shopping-cart span").css("display", "inline-block");
                        $(".cart-footer").remove();
                        $(".shopping-cart").append(
                            ' <div class="cart-footer"><div class="cart-total-price"><div class="total">Total <b>BD ' +
                                parseFloat(response[2]).toFixed(3) +
                                '</b></div></div><div class="dropdown-divider"></div><p class="text-right"><a href="/mycart" class="btn"><strong>View Cart</strong></a><a href="/checkout"class="btn"><strong>Checkout</strong></a></p></div>'
                        );
                    }
                    $.notify("Added to Cart", "success");
                },
                error: function (xhr) {
                    swal("Error!", "You need to login first!", "error");
                },
            });
        }
    );
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
                                        parseFloat(
                                            response[1][j].price
                                        ).toFixed(3) +
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
                        "BD " + parseFloat(response[2]).toFixed(3)
                    );
                    $(".shopping-cart .empty-cart-list").remove();
                    if (response[0].length == 1) {
                        $(".shopping-cart span").css("display", "inline-block");
                        $(".cart-footer").remove();
                        $(".shopping-cart").append(
                            ' <div class="cart-footer"><div class="cart-total-price"><div class="total">Total <b>BD ' +
                                parseFloat(response[2]).toFixed(3) +
                                '</b></div></div><div class="dropdown-divider"></div><p class="text-right"><a href="/mycart" class="btn"><strong>View Cart</strong></a><a href="/checkout"class="btn"><strong>Checkout</strong></a></p></div>'
                        );
                    }
                    $.notify("Added to Cart", "success");
                },
                error: function (xhr) {
                    swal("Error!", "You need to login first!", "error");
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
                                    parseFloat(response[1][j].price).toFixed(
                                        3
                                    ) +
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
                    "BD " + parseFloat(response[2]).toFixed(3)
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
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/user/refresh/count",
            type: "get",
            data: {
                id: e.currentTarget.id,
                count: $(e.currentTarget)
                    .parent()
                    .siblings(".cart-dish-count")
                    .val(),
            },
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

    $("#contact-us-form").on("submit", function (e) {
        e.preventDefault();
        alert("remind me to make this functional");
    });

    $(".card-img-btn").on("click", function (e) {
        $(".loader-container").show();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/get/dish",
            type: "get",
            data: {
                id: e.currentTarget.id,
            },
            success: function (response) {
                $(
                    "#dishModal .modal-dialog .modal-content .modal-body .row .dish-image img"
                ).attr("src", "../storage/" + response[0].image1);
                $(
                    "#dishModal .modal-dialog .modal-content .modal-body .row .product-details .product-name"
                ).text(response[0].name);
                $(
                    "#dishModal .modal-dialog .modal-content .modal-body .row .product-details .product-info .product-info-value1"
                ).text(response[1].title);
                $(
                    "#dishModal .modal-dialog .modal-content .modal-body .row .product-details .product-info .product-info-value2"
                ).text("Product" + response[0].id);
                $(
                    "#dishModal .modal-dialog .modal-content .modal-body .row .product-details .product-price li h2"
                ).text("BD " + response[0].price.toFixed(3));
                $(
                    "#dishModal .modal-dialog .modal-content .modal-body .row .product-details .product-options .product-quantity .btn.btn-primary.btn-lg.btn-block"
                ).attr("id", response[0].id);
                if (response[0].availibility == 1) {
                    $(
                        "#dishModal .modal-dialog .modal-content .modal-body .row .product-details .product-info .product-info-value3"
                    ).text("Available");
                } else {
                    $(
                        "#dishModal .modal-dialog .modal-content .modal-body .row .product-details .product-info .product-info-value3"
                    ).text("Not Available");
                }
                $(".loader-container").hide();
            },
            error: function (xhr) {
                swal("Error!", "Please try again later!", "error");
            },
        });
    });
    $(
        ".product-options .product-quantity .btn.btn-primary.btn-lg.btn-block"
    ).on("click", function (e) {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/user/quick/cart",
            type: "get",
            data: {
                id: e.currentTarget.id,
                count: $(
                    ".product-options .product-quantity #input-quantity"
                ).val(),
            },
            success: function (response) {
                location.reload(true);
            },
            error: function (xhr) {
                swal("Error!", "Please login first!", "error");
            },
        });
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

function scrollLink(e) {
    e.preventDefault();
    var hash = e.target.hash;

    $("html, body").animate(
        {
            scrollTop: $(hash).offset().top,
        },
        800,
        function () {
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
            $(hash).click();
        }
    );
}
