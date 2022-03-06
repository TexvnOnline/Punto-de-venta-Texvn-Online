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