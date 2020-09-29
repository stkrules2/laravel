@extends('layout.app')

@section('content')
<div id="carousel-example-2" class="container-fluid carousel slide carousel-fade carousel-margin" data-ride="carousel">

    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div class="view">
                @foreach($banner as $banner)
                <img class="d-block w-100" src="{{$banner->path}}" alt="First slide">
                <div class="mask rgba-black-light"></div>
                @endforeach
            </div>

        </div>

    </div>

</div>

<div class="container">
    <div class="content">
        <div class="content-heading">
            <div class="bos">best of us</div>
            <h3>Trending Products </h3>
        </div>
    </div>

    <div class="content-tabs">
        <ul class="content-tabs-ul">
            <li class="active"><a href="#tab-featured-0" data-toggle="tab" aria-expanded="true">Cateogory</a>
            </li>
            <li class=""><a href="#tab-latest-0" data-toggle="tab" aria-expanded="false">check</a></li>
            <li class=""><a href="#tab-bestseller-0" data-toggle="tab" aria-expanded="false">Cateogory</a>
            </li>
        </ul>
    </div>
    <div class="card-container">
        <div class="row">
            <div class="col-md-12">
                <div id="news-slider10" class="owl-carousel">
                    <div class="post-slide10">
                        <div class="card"><a href="#">
                                <img class="image_thumb"
                                    src="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/image/cache/catalog/demo/product/20-295x384.jpg"
                                    title="voluptate velit esse" alt="voluptate velit esse"> <img class="img-top"
                                    src="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/image/cache/catalog/demo/product/16-295x384.jpg"
                                    title="voluptate velit esse" alt="voluptate velit esse"> </a>
                            <button class="btn card-img-btn"><i class="fa fa-eye"></i>&nbsp;&nbsp;Quick
                                View</button>
                            <div class="card-text">
                                <a href="#">
                                    <h4>aliquam quaerat voluptatem</h4>
                                </a>

                            </div>
                            <div class="price">
                                <span class="price-new">$62.00</span>
                                <span class="price-old">$122.00</span>
                                <span class="price-tax">Without tax: $50.00</span>
                            </div>
                            <div class="button-group">
                                <button class="btn btn-wishlist" title="Add to wishlist">
                                    <i class="fa fa-heart"></i> <span title="Add to wishlist"></span>
                                </button>
                                <button class="btn btn-cart " type="button" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add
                                        to
                                        Cart</span>
                                </button>
                                <button class="btn btn-compare" title="Add to Compare">
                                    <i class="fa fa-bar-chart" aria-hidden="true"></i> <span
                                        title="Add to Compare"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="post-slide10">
                        <div class="card"><a href="#">
                                <img class="image_thumb"
                                    src="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/image/cache/catalog/demo/product/20-295x384.jpg"
                                    title="voluptate velit esse" alt="voluptate velit esse"> <img class="img-top"
                                    src="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/image/cache/catalog/demo/product/16-295x384.jpg"
                                    title="voluptate velit esse" alt="voluptate velit esse"> </a>
                            <button class="btn card-img-btn"><i class="fa fa-eye"></i>&nbsp;&nbsp;Quick
                                View</button>
                            <div class="card-text">
                                <a href="#">
                                    <h4>aliquam quaerat voluptatem</h4>
                                </a>

                            </div>
                            <div class="price">
                                <span class="price-new">$62.00</span>
                                <span class="price-old">$122.00</span>
                                <span class="price-tax">Without tax: $50.00</span>
                            </div>
                            <div class="button-group">
                                <button class="btn btn-wishlist" title="Add to wishlist">
                                    <i class="fa fa-heart"></i> <span title="Add to wishlist"></span>
                                </button>
                                <button class="btn btn-cart " type="button" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add
                                        to
                                        Cart</span>
                                </button>
                                <button class="btn btn-compare" title="Add to Compare">
                                    <i class="fa fa-bar-chart" aria-hidden="true"></i> <span
                                        title="Add to Compare"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="post-slide10">
                        <div class="card"><a href="#">
                                <img class="image_thumb"
                                    src="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/image/cache/catalog/demo/product/20-295x384.jpg"
                                    title="voluptate velit esse" alt="voluptate velit esse"> <img class="img-top"
                                    src="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/image/cache/catalog/demo/product/16-295x384.jpg"
                                    title="voluptate velit esse" alt="voluptate velit esse"> </a>
                            <button class="btn card-img-btn"><i class="fa fa-eye"></i>&nbsp;&nbsp;Quick
                                View</button>
                            <div class="card-text">
                                <a href="#">
                                    <h4>aliquam quaerat voluptatem</h4>
                                </a>

                            </div>
                            <div class="price">
                                <span class="price-new">$62.00</span>
                                <span class="price-old">$122.00</span>
                                <span class="price-tax">Without tax: $50.00</span>
                            </div>
                            <div class="button-group">
                                <button class="btn btn-wishlist" title="Add to wishlist">
                                    <i class="fa fa-heart"></i> <span title="Add to wishlist"></span>
                                </button>
                                <button class="btn btn-cart " type="button" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add
                                        to
                                        Cart</span>
                                </button>
                                <button class="btn btn-compare" title="Add to Compare">
                                    <i class="fa fa-bar-chart" aria-hidden="true"></i> <span
                                        title="Add to Compare"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="post-slide10">
                        <div class="card"><a href="#">
                                <img class="image_thumb"
                                    src="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/image/cache/catalog/demo/product/20-295x384.jpg"
                                    title="voluptate velit esse" alt="voluptate velit esse"> <img class="img-top"
                                    src="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/image/cache/catalog/demo/product/16-295x384.jpg"
                                    title="voluptate velit esse" alt="voluptate velit esse"> </a>
                            <button class="btn card-img-btn"><i class="fa fa-eye"></i>&nbsp;&nbsp;Quick
                                View</button>
                            <div class="card-text">
                                <a href="#">
                                    <h4>aliquam quaerat voluptatem</h4>
                                </a>

                            </div>
                            <div class="price">
                                <span class="price-new">$62.00</span>
                                <span class="price-old">$122.00</span>
                                <span class="price-tax">Without tax: $50.00</span>
                            </div>
                            <div class="button-group">
                                <button class="btn btn-wishlist" title="Add to wishlist">
                                    <i class="fa fa-heart"></i> <span title="Add to wishlist"></span>
                                </button>
                                <button class="btn btn-cart " type="button" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add
                                        to
                                        Cart</span>
                                </button>
                                <button class="btn btn-compare" title="Add to Compare">
                                    <i class="fa fa-bar-chart" aria-hidden="true"></i> <span
                                        title="Add to Compare"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="post-slide10">
                        <div class="card"><a href="#">
                                <img class="image_thumb"
                                    src="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/image/cache/catalog/demo/product/20-295x384.jpg"
                                    title="voluptate velit esse" alt="voluptate velit esse"> <img class="img-top"
                                    src="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/image/cache/catalog/demo/product/16-295x384.jpg"
                                    title="voluptate velit esse" alt="voluptate velit esse"> </a>
                            <button class="btn card-img-btn"><i class="fa fa-eye"></i>&nbsp;&nbsp;Quick
                                View</button>
                            <div class="card-text">
                                <a href="#">
                                    <h4>aliquam quaerat voluptatem</h4>
                                </a>

                            </div>
                            <div class="price">
                                <span class="price-new">$62.00</span>
                                <span class="price-old">$122.00</span>
                                <span class="price-tax">Without tax: $50.00</span>
                            </div>
                            <div class="button-group">
                                <button class="btn btn-wishlist" title="Add to wishlist">
                                    <i class="fa fa-heart"></i> <span title="Add to wishlist"></span>
                                </button>
                                <button class="btn btn-cart " type="button" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add
                                        to
                                        Cart</span>
                                </button>
                                <button class="btn btn-compare" title="Add to Compare">
                                    <i class="fa fa-bar-chart" aria-hidden="true"></i> <span
                                        title="Add to Compare"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="post-slide10">
                        <div class="card"><a href="#">
                                <img class="image_thumb"
                                    src="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/image/cache/catalog/demo/product/20-295x384.jpg"
                                    title="voluptate velit esse" alt="voluptate velit esse"> <img class="img-top"
                                    src="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/image/cache/catalog/demo/product/16-295x384.jpg"
                                    title="voluptate velit esse" alt="voluptate velit esse"> </a>
                            <button class="btn card-img-btn"><i class="fa fa-eye"></i>&nbsp;&nbsp;Quick
                                View</button>
                            <div class="card-text">
                                <a href="#">
                                    <h4>aliquam quaerat voluptatem</h4>
                                </a>

                            </div>
                            <div class="price">
                                <span class="price-new">$62.00</span>
                                <span class="price-old">$122.00</span>
                                <span class="price-tax">Without tax: $50.00</span>
                            </div>
                            <div class="button-group">
                                <button class="btn btn-wishlist" title="Add to wishlist">
                                    <i class="fa fa-heart"></i> <span title="Add to wishlist"></span>
                                </button>
                                <button class="btn btn-cart " type="button" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add
                                        to
                                        Cart</span>
                                </button>
                                <button class="btn btn-compare" title="Add to Compare">
                                    <i class="fa fa-bar-chart" aria-hidden="true"></i> <span
                                        title="Add to Compare"></span>
                                </button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <br>
    </div>

</div>
<div class="top-categories">
    <div class="container">
        <div class="row">
            <div class="category-text col-sm-12 col-md-4">
                <span class="category-title">history</span>
                <h3 class="category-heading">Who We Are</h3>
                <div class="category-subheading">Lorem ipsum dolor sit amet, consectetur
                    Fusce sapien metus, bibendum ac porta ut, sollicitudin
                    onlectus. Donec cursus est tortor Vivamus </div>
                <div class="category-button"><a href="#" class="btn">About Us</a></div>
            </div>
            <div class="category-gallery col-sm-12 col-md-8">
                <div class="categories-product-carousel owl-carousel owl-theme">
                    <figure><img src="{{ URL::to('img/product-images/slider-1.jpg') }}" class="item"></figure>
                    <figure><img src="{{ URL::to('img/product-images/slider-2.jpg') }}" class="item"></figure>
                    <figure><img src="{{ URL::to('img/product-images/slider-3.jpg') }}" class="item"></figure>
                    <figure><img src="{{ URL::to('img/product-images/slider-4.jpg') }}" class="item"></figure>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">

    <div class="content">

        <div class="content-heading">
            <div class="bos">best of us</div>
            <h3>Special Products </h3>
        </div>


    </div>
    <div class="row">
        <div class=" col-sm-12 owl-carousel owl-theme" style="display:block">
            <div class="carousel2">
                <div class="card item"><a href="#">
                        <img class="image_thumb"
                            src="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/image/cache/catalog/demo/product/20-295x384.jpg"
                            title="voluptate velit esse" alt="voluptate velit esse"> <img class="img-top"
                            src="https://demo.templatetrip.com/Opencart/OPC07/OPC202_tomato/OPC04/image/cache/catalog/demo/product/16-295x384.jpg"
                            title="voluptate velit esse" alt="voluptate velit esse"> </a>
                    <button class="btn card-img-btn"><i class="fa fa-eye"></i>&nbsp;&nbsp;Quick
                        View</button>
                    <div class="card-text">
                        <a href="#">
                            <h4>aliquam quaerat voluptatem</h4>
                        </a>

                    </div>
                    <div class="price">
                        <span class="price-new">$62.00</span>
                        <span class="price-old">$122.00</span>
                        <span class="price-tax">Without tax: $50.00</span>
                    </div>
                    <div class="button-group">
                        <button class="btn btn-wishlist" title="Add to wishlist">
                            <i class="fa fa-heart"></i> <span title="Add to wishlist"></span>
                        </button>
                        <button class="btn btn-cart " type="button" title="Add to Cart">
                            <i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add
                                to
                                Cart</span>
                        </button>
                        <button class="btn btn-compare" title="Add to Compare">
                            <i class="fa fa-bar-chart" aria-hidden="true"></i> <span title="Add to Compare"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="promotion-container">
    <div>
        <figure class="figure1"><img src="{{ URL::to('img/promotion-images/banner-01.jpg') }}" alt=""></figure>
        <div class="show-off"></div>
    </div>
    <div>
        <figure class="figure2"><img src="{{ URL::to('img/promotion-images/banner-02.jpg') }}" alt=""></figure>
        <div class="show-off"></div>
    </div>
    <div>
        <figure class="figure3"><img src="{{ URL::to('img/promotion-images/banner-03.jpg') }}" alt=""></figure>
        <div class="show-off"></div>
    </div>

</div>
<div class="map-container">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14315.106282143128!2d50.5918502!3d26.2364484!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x907c5be8df48780d!2zS0FCQUIgSE9VU0UgQkFIUkFJTiDZhdi32LnZhSDYqNmK2Kog2KfZhNmD2KjYp9io!5e0!3m2!1sen!2s!4v1600693747749!5m2!1sen!2s"
        class="map" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
                    <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i
                                class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
            <hr>
        </div>

    </div>
</section>


@endsection