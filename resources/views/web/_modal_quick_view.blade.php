<div class="modal" id="quick_view{{$product->id}}">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- product details inner end -->

                @include('web.products._product_details_inner',[
                    'col_1'=> '5',
                    'col_2'=> '7',
                    'img_zoom'=> '',
                    'share'=> false
                ])
                
                <!-- product details inner end -->
            </div>
        </div>
    </div>
</div>