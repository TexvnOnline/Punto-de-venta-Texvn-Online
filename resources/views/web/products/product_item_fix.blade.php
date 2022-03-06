<div class="product-item fix {{$mb}}">
    <div class="product-thumb">
        <a href="{{route('web.product_details', $product)}}">
            <img src="{{$product->images->pluck('url')[0]}}" class="img-pri" alt="{{$product->name}}">
            <img src="{{$product->images->pluck('url')[1]}}" class="img-sec" alt="{{$product->name}}">
        </a>
        <div class="product-label">
            @if ($product->has_promotions())
            <span>
                {{--  <i class="fa fa-percent"></i>  --}}
                Dto
                {{--  <strong >% {{$product->totalDiscountPercentage}}</strong>  --}}
            </span>
            @endif
        </div>
        <div class="product-action-link">
            <a href="#" data-toggle="modal" data-target="#quick_view{{$product->id}}"> <span
                    data-toggle="tooltip" data-placement="left" title="Quick view"><i
                        class="fa fa-search"></i></span> </a>
            <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                    class="fa fa-heart-o"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                    class="fa fa-refresh"></i></a>
            <a href="{{route('store_a_product',$product)}}" data-toggle="tooltip" data-placement="left" title="Add to cart"><i
                    class="fa fa-shopping-cart"></i></a>
        </div>
    </div>
    <div class="product-content">
        <h4><a href="{{route('web.product_details', $product)}}">{{$product->name}}</a></h4>
        <div class="pricebox">
            @if ($product->has_promotions())
            <span class="regular-price">s/{{$product->discountedPrice}}</span>
            <span class="regular-price ml-2">
                <del>s/{{$product->sell_price}}</del>
            </span>
            @else
            <span class="regular-price">s/{{$product->sell_price}}</span>
            @endif
        </div>

        @include('web.products._ratings')

    </div>
</div>

@push('modal')
    @include('web._modal_quick_view')
@endpush

