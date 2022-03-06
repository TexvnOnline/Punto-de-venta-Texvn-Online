<div class="sidebar-widget mb-22">
    <div class="sidebar-title mb-20">
        <h3>Etiquetas</h3>
    </div>

    <div class="sidebar-widget-body">
        <div class="product-tag">
            @foreach ($web_tags_products as $web_tag_product)
            <a href="{{route('web.get_products_tag', $web_tag_product)}}">{{$web_tag_product->name}}</a>
            @endforeach
        </div>
    </div>
</div>