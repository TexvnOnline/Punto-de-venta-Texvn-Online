
    <div class="section-title-2 d-flex justify-content-between mb-28">
        <h3>Destacados</h3>
        <div class="category-append"></div>
    </div> <!-- section title end -->
    <div class="category-carousel-active row" data-row="4">

        @foreach ($featured_products as $featured_product)

        <div class="col">
            @include('web.products._category_item', [
                'product' => $featured_product
            ])
        </div>
        @endforeach
    </div>
