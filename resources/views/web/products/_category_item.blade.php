<div class="category-item">
    <div class="category-thumb">
        <a href="{{route('web.product_details', $product)}}">
            <img src="{{$product->images->pluck('url')[0]}}" alt="{{$product->name}}">
        </a>
    </div>
    <div class="category-content">
        <h4><a href="{{route('web.product_details', $product)}}">{{$product->name}}</a></h4>
        <div class="price-box">
            @if ($product->has_promotions())
            <div class="regular-price">
                s/{{$product->discountedPrice}}
            </div>
            <div class="old-price">
                <del>s/{{$product->sell_price}}</del>
            </div>
            @else
            <div class="regular-price">
                s/{{$product->sell_price}}
            </div>
            @endif
        </div>
        @include('web.products._ratings')
    </div>
</div>