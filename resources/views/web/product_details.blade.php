@extends('layouts.web')
@section('meta_description', '')
@section('title', '')
@section('styles')
    
@endsection
@section('content')
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            @foreach ($breadcrumbs as $breadcrumb)
                            <li class="breadcrumb-item
                            @if ($loop->last)
                                active
                            @endif
                            ">
                            @if ($loop->last)
                                {{$breadcrumb['text']}}
                            @else
                            <a href="{{$breadcrumb['url']}}"> {{$breadcrumb['text']}}</a>  
                            @endif
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- product details wrapper start -->
<div class="product-details-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <!-- product details inner end -->

                @include('web.products._product_details_inner',[
                    'col_1'=> '6',
                    'col_2'=> '6',
                    'img_zoom'=> 'img-zoom',
                    'share'=> true
                ])

                <!-- product details inner end -->

                <!-- product details reviews start -->
                <div class="product-details-reviews mt-34">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-review-info">
                                <ul class="nav review-tab">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#tab_one">descripción</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab_two">información</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab_three">comentarios</a>
                                    </li>
                                </ul>
                                <div class="tab-content reviews-tab">
                                    <div class="tab-pane fade show active" id="tab_one">
                                        <div class="tab-one">
                                            {!! $product->long_description !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab_two">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>color</td>
                                                    <td>black, blue, red</td>
                                                </tr>
                                                <tr>
                                                    <td>size</td>
                                                    <td>L, M, S</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tab_three">

                                        @include('web.products._review_product_form')
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product details reviews end -->

                <!-- related products area start -->

                @include('web._related_products')
                <!-- related products area end -->
            </div>

            <!-- sidebar start -->
            <div class="col-lg-3">
                <div class="shop-sidebar-wrap fix mt-md-22 mt-sm-22">
                    <!-- featured category start -->
                    @include('web._featured_category')
                    <!-- featured category end -->
                    <!-- sidebar categorie start -->
                    @include('web._sidebar_categorie')
                    <!-- sidebar categorie start -->
                    

                    <!-- manufacturer start -->
                    {{--  <div class="sidebar-widget mb-22">
                        <div class="sidebar-title mb-10">
                            <h3>Manufacturers</h3>
                        </div>
                        <div class="sidebar-widget-body">
                            <ul>
                                <li><i class="fa fa-angle-right"></i><a href="#">calvin klein</a><span>(10)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">diesel</a><span>(12)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">polo</a><span>(20)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">Tommy Hilfiger</a><span>(12)</span>
                                </li>
                                <li><i class="fa fa-angle-right"></i><a href="#">Versace</a><span>(16)</span></li>
                            </ul>
                        </div>
                    </div>  --}}
                    <!-- manufacturer end -->

                    <!-- product tag start -->
                    @include('web._product_tag')
                    <!-- product tag end -->

                    <!-- sidebar banner start -->
                    {{--  <div class="sidebar-widget mb-22">
                        <div class="img-container fix img-full mt-30">
                            <a href="#"><img src="{!!asset('galio/assets/img/banner/banner_shop.jpg')!!}" alt=""></a>
                        </div>
                    </div>  --}}
                    <!-- sidebar banner end -->
                </div>
            </div>
            <!-- sidebar end -->
        </div>
    </div>
</div>
<!-- product details wrapper end -->

<!-- brand area start -->
@include('web._brand_area')
<!-- brand area end -->
@endsection
@section('scripts')
    
@endsection


