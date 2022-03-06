
<div class="blog-sidebar mb-30">
    <div class="sidebar-serch-form">
        <form action="{{route('web.search_posts')}}" method="GET" id="form_search_posts">
            <input type="text" name="search_words" id="search_posts" class="search-field" placeholder="search here" autocomplete="off">
            <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div> <!-- single sidebar end -->

<div class="blog-sidebar mb-24">
    <h4 class="title mb-20">Categorías</h4>
    <ul class="blog-archive">
        @foreach ($post_categories as $category)
        <li><a href="{{route('web.get_posts_category',$category )}}">{{$category->name}} ({{$category->posts->count()}})</a></li>
        @endforeach
    </ul>
</div> <!-- single sidebar end -->

<div class="blog-sidebar mb-24">
    <h4 class="title mb-20">Blog Archives</h4>
    <ul class="blog-archive">
      @foreach ($months as $month)
        <li><a href="{{route('web.get_posts_month', \Str::slug($month->date, '-'))}}">{{$month->date}} ({{$month->count}})</a></li>
      @endforeach
    </ul>
</div> <!-- single sidebar end -->


<div class="blog-sidebar mb-24">
    <h4 class="title mb-30">Publicaciones recientes</h4>
    @foreach ($recent_posts as $post)
    <div class="recent-post mb-20">
        {{--  <div class="recent-post-thumb">
            <a href="{{route('web.blog_details',$post)}}">
                <img src="galio/assets/img/product/product-img1.jpg" alt="{{$post->title}}">
            </a>
        </div>  --}}
        <div class="recent-post-des">
            <span><a href="{{route('web.blog_details',$post)}}">{{$post->title}}</a></span>
            <span class="post-date">{{$post->published_at}}</span>
        </div>
        
    </div> 
    @endforeach
   
</div> <!-- single sidebar end -->

<div class="blog-sidebar mb-24">
    <h4 class="title mb-30">Tags</h4>
    <ul class="blog-tags">
        @foreach ($post_tags as $tag)
        <li><a href="{{route('web.get_posts_tag', $tag)}}">{{$tag->name}}</a></li> 
        @endforeach
    </ul>
</div> 

@push('scripts')
<script>
    $(function(){
        var posts = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // `states` is an array of state names defined in "The Basics"
        prefetch: "{{route('posts.json')}}"

      });
      
      $('#search_posts').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
      },
      {
        name: 'posts',
        source: posts
      }).on('typeahead:selected', function(event, selection) {
        $('#form_search_posts').submit();
      });
});
</script>
@endpush