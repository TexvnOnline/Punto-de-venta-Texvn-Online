
    <div class="blog-item {{$mb}}">
        @include('web._blog_thumb')
        <div class="blog-content">
            <h3><a href="{{route('web.blog_details', $post)}}">{{$post->title}}</a></h3>
            <div class="blog-meta">
                {{--  <span class="posted-author">by: admin</span>  --}}
                <span class="post-date">{{$post->published_at}}</span>
            </div>
            <p>{{$post->excerpt}}</p>
        </div>
        @if ($read_more)
        <a href="{{route('web.blog_details', $post)}}">read more <i class="fa fa-long-arrow-right"></i></a>
        @endif
    </div>