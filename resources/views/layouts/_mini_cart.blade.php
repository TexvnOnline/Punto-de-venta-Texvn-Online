<div class="header-mini-cart">
    <div class="mini-cart-btn">
        <i class="fa fa-shopping-cart"></i>
        @if ($shopping_cart->quantity_of_products() != 0)
        <span class="cart-notification">{{$shopping_cart->quantity_of_products()}}</span>
        @endif
    </div>
    <div class="cart-total-price">
        <span>total</span>
        s/{{$shopping_cart->subtotal()}}
    </div>
    <ul class="cart-list">
        @if ($shopping_cart->has_products())
            @foreach ($shopping_cart->shopping_cart_details as $shopping_cart_detail)
                <li>
                    <div class="cart-img">
                        <a href="{{route('web.product_details', $shopping_cart_detail->product)}}"><img src="{{$shopping_cart_detail->product->images->pluck('url')[0]}}" alt="{{$shopping_cart_detail->product->name}}"></a>

                        
                    </div>
                    <div class="cart-info">
                        <h4><a href="{{route('web.product_details', $shopping_cart_detail->product)}}">{{$shopping_cart_detail->product->name}}</a></h4>
                                <span>
                                    @if ($shopping_cart_detail->product->has_promotions())
                                        s/{{$shopping_cart_detail->product->discountedPrice}}
                                        <del>s/{{$shopping_cart_detail->product->sell_price}}</del>
                                    @else
                                        s/{{$shopping_cart_detail->product->sell_price}}
                                    @endif

                                    <strong class="float-right" style="color: black"> x{{$shopping_cart_detail->quantity}}</strong>
                                

                                </span>
                            
                    </div>
                    <div class="del-icon">
                        <a href="{{route('shopping_cart_details.destroy',$shopping_cart_detail)}}">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </li>
            @endforeach
        @endif
        

        <li class="mini-cart-price">
            <span class="subtotal">subtotal : </span>
            <span class="subtotal-price">s/{{$shopping_cart->subtotal()}}</span>
        </li>

        <div class="row">
            @if ($shopping_cart->has_products())
            <div class="col">
                <li class="checkout-btn">
                    <a href="{{route('web.checkout')}}">Pagar</a>
                </li>
            </div>
            <div class="col">
                <li class="checkout-btn">
                    <a href="{{route('web.cart')}}">Carrito</a>
                </li>
            </div> 
            @endif
        </div>
    </ul>
</div>