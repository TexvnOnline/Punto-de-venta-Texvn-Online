{{--  @push('meta')
    <meta property="og:url"           content="{{ request()->fullUrl() }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $product->name }}" />
    <meta property="og:description"   content="{{ $product->short_description }}" />
    <meta property="og:image"         content="{{ request()->root()}}{{$product->images->pluck('url')[0]}}" /> 
@endpush  --}}
<div class="product-details-inner">
    <div class="row">
        {{--  col-lg-6 simgle  col-lg-5--}} 
        <div class="col-lg-{{$col_1}}">
            <div class="product-large-slider slick-arrow-style_2 mb-20">
                @foreach ($product->images as $key => $image)
                {{--  img-zoom  --}}
                <div class="pro-large-img {{$img_zoom}}" id="img{{$key}}">
                    <img src="{{$image->url}}" alt="{{$product->name}}" />
                </div>
                @endforeach
            </div>
            <div class="pro-nav slick-padding2 slick-arrow-style_2">
                @foreach ($product->images as $key => $image)
                <div class="pro-nav-thumb">
                    <img src="{{$image->url}}"
                    alt="{{$product->name}}" />
                </div>
                @endforeach
            </div>
        </div>
        {{--  col-lg-6  single col-lg-7--}}
        <div class="col-lg-{{$col_2}}">
            <div class="product-details-des mt-md-34 mt-sm-34">
                <h3>
                    <a href="{{route('web.product_details', $product)}}">{{$product->name}}</a>
                </h3>
                @include('web.products._ratings')

                <div class="customer-rev">

                    @guest
                    <a href="{{route('web.login_error')}}" >Escribir comentario</a>
                    @else
                    <a href="#" data-toggle="modal" data-target="#modal-default">Escribir comentario</a>
                    @endguest

                    
                </div>

                <div class="availability mt-10">
                    <h5>Availability:</h5>
                    <span>{{$product->stock}} in stock</span>
                </div>
                <div class="pricebox">
                    <span class="regular-price">s/{{$product->sell_price}}</span>
                </div>
                <p>{{$product->short_description}}</p>
                
                @include('web._add_to_shopping_cart_form', ['class'=>''])

                {{--  <div class="useful-links mt-20">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i
                            class="fa fa-refresh"></i>compare</a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Wishlist"><i
                            class="fa fa-heart-o"></i>wishlist</a>
                </div>  --}}
                @if ($share)
                <div class="share-icon mt-20">

                    <a  target="_blank" class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}&title={{$product->name}}"><i class="fa fa-facebook"></i>Facebook</a>

                    {{--  <a class="facebook" href="https://www.facebook.com/dialog/share?app_id={app_id}&display={page_type}&href={url}&redirect_uri={redirect_url}"><i class="fa fa-facebook"></i>Facebook</a>  --}}

                    {{--  <div 
                    class="fb-share-button" 
                    data-href="{{ request()->fullUrl() }}" 
                    data-layout="button_count" 
                    data-size="small"
                    >
                        <a 
                        target="_blank" 
                        href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" 
                        class="fb-xfbml-parse-ignore">
                        Compartir
                        </a>

                    </div>  --}}

                    <a target="_blank"  class="twitter" href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{$product->name}}&via={{ config('app.name', 'TexvnOnline') }}&hashtags={{ config('app.name', 'TexvnOnline') }}"><i class="fa fa-twitter"></i>Twitter</a>

                    <a target="_blank" class="pinterest" href="http://pinterest.com/pin/create/link/?url={{ request()->fullUrl() }}"><i class="fa fa-pinterest"></i>Pinterest</a>


                    {{--  <a target="_blank" class="google" href="https://api.whatsapp.com/send?phone={{$web_company->phone}}&text={{$product->name}}%20{{ request()->fullUrl() }}"><i class="fa fa-whatsapp"></i>WhatsApp</a>  --}}

                </div>
                @endif
                

            </div>
        </div>
    </div>
</div>

{{--  @push('scripts')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@endpush  --}}

{{--  <div class="">
    <div class="row">
        <div class="col-lg-5">
            <div class="product-large-slider slick-arrow-style_2 mb-20">
                @foreach ($product->images as $image)
                <div class="pro-large-img">
                    <img src="{{$image->url}}" alt="{{$product->name}}" />
                </div>
                @endforeach
            </div>
            <div class="pro-nav slick-padding2 slick-arrow-style_2">
                
                @foreach ($product->images as $image)
                <div class="pro-nav-thumb">
                    <img src="{{$image->url}}" alt="{{$product->name}}" />
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-7">
            <div class="product-details-des mt-md-34 mt-sm-34">
                <h3>
                    <a href="{{route('web.product_details', $product)}}">{{$product->name}}</a>
                </h3>
                <div class="ratings">
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span><i class="fa fa-star"></i></span>
                    <div class="pro-review">
                        <span>1 review(s)</span>
                    </div>
                </div>

                <div class="availability mt-10">
                    <h5>Availability:</h5>
                    <span>{{$product->stock}} in stock</span>
                </div>
                <div class="pricebox">
                    <span class="regular-price">s/{{$product->sell_price}}</span>
                </div>
                <p>{{$product->short_description}}</p>
                @include('web._add_to_shopping_cart_form', ['class'=>'mt-20'])
            </div>
        </div>
    </div>
</div>  --}}