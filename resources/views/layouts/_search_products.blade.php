

<div class="header-middle-searchbox">
  <form action="{{route('web.search_products')}}" id="form_search_products" method="GET">
      <input id="search_products" name="search_words" type="text" placeholder="Buscar..." autocomplete="off">
      <button class="search-btn"><i class="fa fa-search"></i></button>
  </form>
</div>

@push('scripts')
<script>
    $(function(){
        var products = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // `states` is an array of state names defined in "The Basics"
        prefetch: "{{route('products.json')}}"

      });
      
      $('#search_products').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
      },
      {
        name: 'products',
        source: products
      }).on('typeahead:selected', function(event, selection) {
        $('#form_search_products').submit();
      });
});
</script>
@endpush