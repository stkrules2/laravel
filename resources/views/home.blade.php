@extends('layout.app')

@section('content')
<div id="newsletter-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="newsletter-notification row">
                <div id="popup2">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="newsletter-image col-sm-5 col-xs-5"> </div>

                <div class="col-sm-7 col-xs-7 box ">
                    <div class="newletter-title">
                        <h2>Newsletter</h2>
                    </div>
                    <div class="box-content newleter-content">
                        <div id="frm_subscribe">
                            <form name="subscribe" id="subscribe_popup">
                                <div class="newslatterpopup-content">
                                    <span>Subscribe to our newsletters now and stay up to date with new collections,
                                        latest
                                        lookbooks and exclusive offers.</span>
                                    <div id="notification"></div>
                                    <input type="text" value="" name="subscribe_pemail" id="subscribe_pemail" placeholder="Your email address">
                                    <input type="hidden" value="" name="subscribe_pname" id="subscribe_pname">

                                    <div class="popup-button">
                                        <a class="button btn btn-primary"><span>subscribe</span></a>
                                    </div>
                                </div>
                            </form>

                        </div><!-- /#frm_subscribe -->
                    </div><!-- /.box-content -->
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container-fluid carousel-margin">

    @if(isset($banner))
    @foreach($banner as $banner)

    @if(isset($banner->path1) || isset($banner->path2) || isset($banner->path3) || isset($banner->path4) ||
    isset($banner->path5))

    <div class="owl-carousel owl-theme banner-carousel">
        @if(isset($banner->path1))
        <div class="item">
            <img class="d-block w-100" src="../storage/{{$banner->path1}}" alt="First slide" loading="lazy">
        </div>
        @endif
        @if(isset($banner->path2))
        <div class="item">
            <img class="d-block w-100" src="../storage/{{$banner->path2}}" alt="First slide" loading="lazy">
        </div>
        @endif
        @if(isset($banner->path3))
        <div class="item">
            <img class="d-block w-100" src="../storage/{{$banner->path3}}" alt="First slide" loading="lazy">
        </div>
        @endif
        @if(isset($banner->path4))
        <div class="item">
            <img class="d-block w-100" src="../storage/{{$banner->path4}}" alt="First slide" loading="lazy">
        </div>
        @endif
        @if(isset($banner->path5))
        <div class="item">
            <img class="d-block w-100" src="../storage/{{$banner->path5}}" alt="First slide" loading="lazy">
        </div>
        @endif
    </div>
    @else
    <img class="d-block w-100" src="{{ URL::to('img/bannner/1770X830BANNER.png') }}" alt="First slide" loading="lazy">
    @endif
    @endforeach
    @else
    <img class="d-block w-100" src="{{ URL::to('img/bannner/1770X830BANNER.png') }}" alt="First slide" loading="lazy">


    @endif


</div>

<div class="dishes-container">
    <div class="content">
        <div class="content-heading">
            <div class="bos">best of us</div>
            <h3>Finest Dishes </h3>
        </div>
    </div>

    <div class="content-tabs">
        <ul class="content-tabs-ul">
            @if(isset($category))
            <?php $count = 0 ?>
            @foreach($category as $cat)

            @if($count < 4) @if($count===0) <span class="top">
                <li class="active"><a href="#tab-featured-0" data-toggle="tab" aria-expanded="true" id="categoryScroll{{$cat->id}}">{{$cat->title}}</a>
                </li>
                @else
                <li><a href="#tab-featured-0" data-toggle="tab" aria-expanded="true" id="categoryScroll{{$cat->id}}">{{$cat->title}}</a></li>

                @endif
                @if($count === 3)
                </span>
                @endif
                @endif
                @if($count >= 4)
                @if($count === 4)
                <span class="bottom">
                    <li><a href="#tab-featured-0" data-toggle="tab" aria-expanded="true" id="categoryScroll{{$cat->id}}">{{$cat->title}}</a>
                    </li>
                    @else
                    <li><a href="#tab-featured-0" data-toggle="tab" aria-expanded="true" id="categoryScroll{{$cat->id}}">{{$cat->title}}</a></li>
                    @if($count === (count($category) - 1))
                </span>
                @endif
                @endif
                @endif
                <?php $count = $count + 1 ?>
                @endforeach
                @endif
        </ul>
    </div>
    <div class="card-container container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="news-slider10" class="owl-carousel">

                    <span style="display: none;">{{$firstcat = $category->first()}}</span>

                    @if(isset($firstcat))
                    @foreach($dish->where('category_id', $firstcat->id) as $dishes)


                    <div class="post-slide10">
                        <div class="custom-card">
                            <a href="#">
                                <img class="image_thumb" src="../storage/{{$dishes->image1}}" title="{{$dishes->name}}" alt="{{$dishes->name}}" loading="lazy">
                                @if($dishes->image2)

                                <img class="img-top" src="../storage/{{$dishes->image2}}" title="{{$dishes->name}}" alt="{{$dishes->name}}" loading="lazy">
                                @endif
                            </a>
                            <button class="btn card-img-btn" id="{{$dishes->id}}"><i class="fa fa-eye"></i>&nbsp;&nbsp;Quick
                                View</button>
                            <div class="card-text">
                                <a href="#">
                                    <h4>{{$dishes->name}}</h4>
                                </a>

                            </div>
                            <div class="price">
                                <span class="price-new">BD&nbsp;{{number_format($dishes->price, 3)}}</span>
                                @if($dishes->before_discount_price)
                                <span class="price-old">BD&nbsp;{{number_format($dishes->before_discount_price, 3)}}</span>
                                @endif
                            </div>
                            <div class="button-group">
                                <button class="btn btn-wishlist add-to-wishlist" title="Add to wishlist" id="{{$dishes->id}}">
                                    <i class="fa fa-heart"></i> <span title="Add to wishlist"></span>
                                </button>
                                <button class="btn btn-cart add-to-cart" type="button" title="Add to Cart" id="{{$dishes->id}}">
                                    <i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add
                                        to
                                        Cart</span>
                                </button>
                                <button class="btn btn-compare" title="Add to Compare" id="{{$dishes->id}}">
                                    <i class="fa fa-bar-chart" aria-hidden="true"></i> <span title="Add to Compare"></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    @endif

                </div>
            </div>
        </div>
        <br>
    </div>

</div>
<div class="top-categories" id="aboutus">
    <div class="container">
        <div class="row">
            <div class="category-text col-sm-12 col-md-4">
                <span class="category-title">history</span>
                <h3 class="category-heading">Who We Are</h3>
                @if(isset($history))
                @if($history->description)
                <div class="category-subheading">{{$history->description}}</div>
                @else
                <div class="category-subheading">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue erat ac ullamcorper porttitor. Nunc faucibus sem ligula, eu vehicula diam posuere in. Quisque pellentesque dapibus nisl id consectetur. Sed nisi ante, euismod rhoncus malesuada sit amet, tristique eu justo. Cras eget lacinia nisi, id interdum lectus. Cras eget condimentum enim, ut pretium sem. Sed non bibendum nisi, ac imperdiet metus.</div>
                @endif
                @else
                <div class="category-subheading">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue erat ac ullamcorper porttitor. Nunc faucibus sem ligula, eu vehicula diam posuere in. Quisque pellentesque dapibus nisl id consectetur. Sed nisi ante, euismod rhoncus malesuada sit amet, tristique eu justo. Cras eget lacinia nisi, id interdum lectus. Cras eget condimentum enim, ut pretium sem. Sed non bibendum nisi, ac imperdiet metus.</div>
                @endif

            </div>
            <div class="category-gallery col-sm-12 col-md-8">
                <div class="categories-product-carousel owl-carousel owl-theme">
                    @if(isset($history))
                    @if($history->path1)
                    <figure><img src="../storage{{$history->path1}}" class="item" loading="lazy"></figure>
                    @else
                    <figure><img src="{{ URL::to('img/product-images/slider-1.jpg') }}" class="item" loading="lazy"></figure>
                    @endif
                    @if($history->path2)
                    <figure><img src="../storage{{$history->path2}}" class="item" loading="lazy"></figure>
                    @else
                    <figure><img src="{{ URL::to('img/product-images/slider-2.jpg') }}" class="item" loading="lazy"></figure>
                    @endif
                    @if($history->path3)
                    <figure><img src="../storage{{$history->path3}}" class="item" loading="lazy"></figure>
                    @else
                    <figure><img src="{{ URL::to('img/product-images/slider-3.jpg') }}" class="item" loading="lazy"></figure>
                    @endif
                    @if($history->path4)
                    <figure><img src="../storage{{$history->path4}}" class="item" loading="lazy"></figure>
                    @else
                    <figure><img src="{{ URL::to('img/product-images/slider-4.jpg') }}" class="item" loading="lazy"></figure>
                    @endif
                    @else
                    <figure><img src="{{ URL::to('img/product-images/slider-1.jpg') }}" class="item" loading="lazy"></figure>
                    <figure><img src="{{ URL::to('img/product-images/slider-2.jpg') }}" class="item" loading="lazy"></figure>
                    <figure><img src="{{ URL::to('img/product-images/slider-3.jpg') }}" class="item" loading="lazy"></figure>
                    <figure><img src="{{ URL::to('img/product-images/slider-4.jpg') }}" class="item" loading="lazy"></figure>
                    @endif
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
                @if(isset($special))
                @foreach($special as $sp)
                <div class="custom-card item"><a href="#">
                        <img class="image_thumb" src="../storage/{{$sp->image1}}" title="{{$sp->name}}" alt="{{$dishes->name}}" loading="lazy">
                        @if($sp->image2)
                        <img class="img-top" src="../storage/{{$sp->image2}}" title="{{$sp->name}}" alt="{{$sp->name}}" loading="lazy">
                        @endif
                    </a>
                    <button class="btn card-img-btn" id="{{$dishes->id}}"><i class="fa fa-eye"></i>&nbsp;&nbsp;Quick
                        View</button>
                    <div class="card-text">
                        <a href="#">
                            <h4>{{$sp->name}}</h4>
                        </a>

                    </div>
                    <div class="price">
                        <span class="price-new">BD&nbsp;{{number_format($sp->price, 3)}}</span>
                        @if($sp->before_discount_price)
                        <span class="price-old">BD&nbsp;{{number_format($sp->before_discount_price, 3)}}</span>
                        @endif
                    </div>
                    <div class="button-group">
                        <button class="btn btn-wishlist add-to-wishlist" title="Add to wishlist" id="{{$dishes->id}}">
                            <i class="fa fa-heart"></i> <span title="Add to wishlist"></span>
                        </button>
                        <button class="btn btn-cart add-to-cart" type="button" title="Add to Cart" id="{{$dishes->id}}">
                            <i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add
                                to
                                Cart</span>
                        </button>
                        <button class="btn btn-compare" title="Add to Compare" id="{{$dishes->id}}">
                            <i class="fa fa-bar-chart" aria-hidden="true"></i> <span title="Add to Compare"></span>
                        </button>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </div>
</div>
<div class="promotion-container">
    @if(isset($promotion))
    @if(isset($promotion->path1))
    <div>
        <figure class="figure1"><img src="../storage/{{$promotion->path1}}" loading="lazy"></figure>
        <div class="show-off"></div>
    </div>
    @else
    <div>
        <figure class="figure1"><img src="{{ URL::to('img/promotion-images/banner-01.jpg') }}" loading="lazy"></figure>
        <div class="show-off"></div>
    </div>
    @endif
    @if(isset($promotion->path2))
    <div>
        <figure class="figure1"><img src="../storage/{{$promotion->path2}}" loading="lazy"></figure>
        <div class="show-off"></div>
    </div>
    @else
    <div>
        <figure class="figure1"><img src="{{ URL::to('img/promotion-images/banner-02.jpg') }}" loading="lazy"></figure>
        <div class="show-off"></div>
    </div>
    @endif
    @if(isset($promotion->path3))
    <div>
        <figure class="figure1"><img src="../storage/{{$promotion->path3}}" loading="lazy"></figure>
        <div class="show-off"></div>
    </div>
    @else
    <div>
        <figure class="figure1"><img src="{{ URL::to('img/promotion-images/banner-03.jpg') }}" loading="lazy"></figure>
        <div class="show-off"></div>
    </div>
    @endif


    @else
    <div>
        <figure class="figure1"><img src="{{ URL::to('img/promotion-images/banner-01.jpg') }}" alt="" loading="lazy"></figure>
        <div class="show-off"></div>
    </div>
    <div>
        <figure class="figure2"><img src="{{ URL::to('img/promotion-images/banner-02.jpg') }}" alt="" loading="lazy"></figure>
        <div class="show-off"></div>
    </div>
    <div>
        <figure class="figure3"><img src="{{ URL::to('img/promotion-images/banner-03.jpg') }}" alt="" loading="lazy"></figure>
        <div class="show-off"></div>
    </div>
    @endif
</div>
<div class="map-container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14315.106282143128!2d50.5918502!3d26.2364484!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x907c5be8df48780d!2zS0FCQUIgSE9VU0UgQkFIUkFJTiDZhdi32LnZhSDYqNmK2Kog2KfZhNmD2KjYp9io!5e0!3m2!1sen!2s!4v1600693747749!5m2!1sen!2s" class="map" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>



@endsection