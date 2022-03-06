@if ($post->images->count() == 1)
<div class="blog-thumb img-full fix">
    <a href="{{route('web.blog_details', $post)}}">
        <img src="{{$post->images->first()->url}}" alt="{{$post->title}}">
    </a>
</div>
@elseif($post->images->count() > 1)
<div class="blog-thumb img-full fix">
    <div class="blog-gallery-slider slick-arrow-style_2">
        @foreach ($post->images->take(4) as $image)
        <div class="blog-single-slide">
            <img src="{{$image->url}}" alt="{{$post->title}}">
        </div>
        @endforeach
    </div>
</div>
@elseif($post->iframe)
<div class="blog-thumb embed-responsive embed-responsive-16by9">
    {!! $post->iframe !!}
</div>
@endif