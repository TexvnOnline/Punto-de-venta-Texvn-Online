<div class="ratings">
    <input name="input-3" value="{{$product->averageRating}}" class="rating-loading rating_input">
    
    @push('scripts')
    <script>
        $(document).ready(function(){
            $('.rating_input').rating({
                theme: 'krajee-fa',
                displayOnly: true, 
                step: 1,
                language: 'es',
                size:'xs',
                showCaption: false,
            });
        });
    </script>
    @endpush

    <div class="pro-review">
        <span>{{$product->timesRated()}} ({{ round($product->averageRating, 1)}})</span>
    </div>
</div>

