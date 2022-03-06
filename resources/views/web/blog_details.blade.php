@extends('layouts.web')
@section('meta_description', '')
@section('title', '')
@section('styles')
    
@endsection
@section('content')
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            @foreach ($breadcrumbs as $breadcrumb)
                            <li class="breadcrumb-item
                            @if ($loop->last)
                                active
                            @endif
                            ">
                            @if ($loop->last)
                                {{$breadcrumb['text']}}
                            @else
                            <a href="{{$breadcrumb['url']}}"> {{$breadcrumb['text']}}</a>  
                            @endif
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- blog main wrapper start -->
<div class="blog-main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2">
                <div class="blog-sidebar-wrapper mt-md-34 mt-sm-30">
                    @include('web.blog._blog_sidebar_wrapper')
                </div>
            </div>
            <div class="col-lg-9 order-1">
                <div class="blog-wrapper-inner">
                    <div class="row blog-content-wrap">
                        <!-- start single blog item -->
                        <div class="col-lg-12">
                            <div class="blog-item mb-30">

                                @include('web._blog_thumb')

                                <div class="blog-content">
                                    <div class="blog-details">
                                        <h3 class="blog-heading">{{$post->title}}</h3>
                                        <div class="blog-meta">
                                            {{--  <a class="author" href="#"><i class="icon-people"></i> Admin</a>  --}}
                                            {{--  <a class="comment" href="#"><i class="icon-bubbles"></i> 3 comment</a>  --}}
                                            <a class="post-time" href="#"><i class="icon-calendar"></i> {{$post->published_at}}</a>
                                        </div>

                                        {!! $post->body !!}

                                            
                                    </div>
                                </div>
                                <div class="tag-line">
                                    <h4>tag:</h4>
                                    @foreach ($post->tags as $tag)
                                    <a href="{{route('web.get_posts_tag', $tag)}}">{{$tag->name}}</a>,
                                    @endforeach
                                </div>

                                <div class="blog-sharing text-center mt-34 mt-sm-34">
                                    <h4>share this post:</h4>

                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}&title={{$post->name}}">
                                        <i class="fa fa-facebook"></i>
                                    </a>

                                    <a target="_blank" 
                                    href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{$post->name}}&via={{ config('app.name', 'TexvnOnline') }}&hashtags={{ config('app.name', 'TexvnOnline') }}">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a target="_blank"  
                                    href="http://pinterest.com/pin/create/link/?url={{ request()->fullUrl() }}">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                    {{--  <a target="_blank" href="https://api.whatsapp.com/send?phone={{$web_company->phone}}&text={{$post->name}}%20{{ request()->fullUrl() }}">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>  --}}

                                </div>
                            </div>

                            <div class="comment-section">
                                <div id="disqus_thread"></div>
                                @include('web._disqus-script')  
                            </div>

                        </div>
                        <!-- end single blog item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog main wrapper end -->

<!-- brand area start -->
@include('web._brand_area')
<!-- brand area end -->
@endsection
@section('scripts')

@endsection

