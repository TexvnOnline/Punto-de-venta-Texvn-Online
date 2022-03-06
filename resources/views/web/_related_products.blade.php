<div class="related-products-area mt-34">
    <div class="section-title mb-30">
        <div class="title-icon">
            <i class="fa fa-desktop"></i>
        </div>
        <h3>related products</h3>
    </div> <!-- section title end -->
    <!-- featured category start -->
    <div class="featured-carousel-active slick-padding slick-arrow-style">
        {{--  6  --}}
        @foreach ($product->similar() as $related_product)
        <div class="product-item fix">
            <div class="product-thumb">
                <a href="{{route('web.product_details', $related_product)}}">
                    <img src="{{$related_product->images->pluck('url')[0]}}" class="img-pri" alt="{{$related_product->name}}">
                    <img src="{{$related_product->images->pluck('url')[1]}}" class="img-sec" alt="{{$related_product->name}}">
                </a>
                <div class="product-label">
                    <span>hot</span>
                </div>
                <div class="product-action-link">
                    <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                            data-toggle="tooltip" data-placement="left" title="Quick view"><i
                                class="fa fa-search"></i></span> </a>
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                            class="fa fa-heart-o"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                            class="fa fa-refresh"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i
                            class="fa fa-shopping-cart"></i></a>
                </div>
            </div>
            <div class="product-content">
                <h4><a href="{{route('web.product_details', $related_product)}}">{{$related_product->name}}</a></h4>
                <div class="pricebox">
                    <span class="regular-price">s/{{$related_product->sell_price}}</span>

                    {{--  <div class="ratings">
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <div class="pro-review">
                            <span>1 review(s)</span>
                        </div>
                    </div>  --}}

                    @include('web.products._ratings', [
                        'product' => $related_product
                    ])

                </div>
            </div>
        </div>
        @endforeach
        
    </div>
    <!-- featured category end -->
</div>