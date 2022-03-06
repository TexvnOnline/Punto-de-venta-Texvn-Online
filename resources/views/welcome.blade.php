@extends('layouts.web')
@section('meta_description', 'Texvn Online')
@section('title', 'Texvn Online')
@section('styles')
    
@endsection
@section('content')
<!-- hero slider start -->
<div class="hero-slider-area">
    <div class="slider-wrapper-area3">
        <div class="hero-slider-active hero__3 slick-dot-style hero-dot">
            @foreach ($sliders as $slider)
            <div class="single-slider d-flex align-items-center" style="background-image: url({{$slider->image->url}});">
                <div class="container">
                    <div class="slider-main-content">
                        <div class="slider-text">
                            {!! $slider->body !!}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- hero slider end -->

<!-- page wrapper start -->
<div class="main-home-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="main-sidebar category-wrapper mb-24 mt-4 mt-md-8 mt-sm-8">
                    @include('web._featured_category')
                </div>
                <!-- best seller area end -->
            </div>
            <div class="col-lg-9">
                <!-- banner statistic start -->
                <div class="banner-statistic pt-6 pb-34">
                    <div class="img-container fix img-full">
                        <a href="#">
                            <img src="galio/assets/img/banner/home3_static5.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- banner statistic end -->
                <!-- category tab area start -->
                <div class="category-tab-area mb-30">
                    <div class="category-tab">
                        <ul class="nav">
                            <li>
                                <i class="fa fa-flask"></i>
                            </li>
                            <li>
                                <a class="active" data-toggle="tab" href="#tab_one">featured</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_two">new</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_three">sale</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content pb-md-20 pb-sm-20">
                    <div class="tab-pane fade show active" id="tab_one">
                        <div class="feature-category-carousel-wrapper">
                            <div class="featured-carousel-active slick-padding slick-arrow-style arrow-space">
                                @foreach ($featured_products->take(6) as $featured_product)

                                @include('web.products.product_item_fix', [
                                    'mb' => '',
                                    'product' => $featured_product
                                ])
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_two">
                        <div class="feature-category-carousel-wrapper">
                            <div class="featured-carousel-active slick-padding slick-arrow-style">
                                @foreach ($new_products as $new_product)
                                @include('web.products.product_item_fix', [
                                    'mb' => '',
                                    'product' => $new_product
                                ])
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_three">
                        <div class="feature-category-carousel-wrapper">
                            <div class="featured-carousel-active slick-padding slick-arrow-style">
                                @foreach ($sale_products as $sale_product)
                                @include('web.products.product_item_fix', [
                                    'mb' => '',
                                    'product' => $sale_product
                                ])
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- category tab area end -->
            </div>
        </div>
    </div>
</div>
<!-- page wrapper end -->

<!-- blog-testimonial-product area start -->
<div class="section mt-3">
    <div class="container">
        <div class="row">
            <!-- blog area start -->
            <div class="col-lg-4">
                <div class="main-sidebar blog-area mb-24 mb-md-20 mb-sm-18">
                    <div class="section-title-2 d-flex justify-content-between mb-28">
                        <h3>latest blog</h3>
                        <div class="category-append"></div>
                    </div> <!-- section title end -->
                    <div class="blog-carousel-active">
                        @foreach ($latest_posts as $latest_post)
                            @include('web.blog._blog_item', [
                                'post' => $latest_post,
                                'mb' => '',
                                'read_more' => false
                            ])
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- blog area end -->
            <!-- testimonial area start -->
            
            <!-- testimonial area end -->
            <!-- most view area start -->
            <div class="col-lg-4">
                <div class="mostview-wrap">
                    <div class="section-title-2 d-flex justify-content-between mb-28">
                        <h3>Most viewed</h3>
                        <div class="category-append"></div>
                    </div> <!-- section title end -->
                    <div class="category-carousel-active row" data-row="2">

                        @foreach ($most_viewed_products as $most_viewed_product)
                        <div class="col">
                            @include('web.products._category_item', [
                                'product' => $most_viewed_product
                            ])
                        </div>
                        @endforeach
                       
                    </div>
                </div>
            </div>
            <!-- most view area end -->
            <!-- hot sale area start -->
            <div class="col-lg-4">
                <div class="hotsale-wrap mt-md-22 mt-sm-22">
                    <div class="section-title-2 d-flex justify-content-between mb-28">
                        <h3>hot sale</h3>
                        <div class="category-append"></div>
                    </div> <!-- section title end -->
                    <div class="category-carousel-active row" data-row="2">
                        
                        @foreach ($products_offer as $product_offer)
                        <div class="col">
                            @include('web.products._category_item', [
                                'product' => $product_offer
                            ])
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- hot sale area end -->
        </div>
    </div>
</div>
<!-- blog-testimonial-product area end -->

<!-- latest product start -->
<div class="latest-product pt-md-30 pt-lg-30 pt-sm-30">
    <div class="container">
        <div class="section-title mb-30">
            <div class="title-icon">
                <i class="fa fa-flash"></i>
            </div>
            <h3>latest product</h3>
        </div> <!-- section title end -->
        <!-- featured category start -->
        <div class="latest-product-active slick-padding slick-arrow-style">
            
            @foreach ($new_products as $new_product)
                @include('web.products.product_item_fix', [
                    'mb'=> '',
                    'product'=> $new_product
                ])
            @endforeach
        </div>
        <!-- featured category end -->
    </div>
</div>
<!-- latest product end -->

<!-- brand area start -->
@include('web._brand_area')
<!-- brand area end -->

@endsection
@section('scripts')
    
@endsection