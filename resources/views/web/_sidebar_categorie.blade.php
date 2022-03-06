<div class="sidebar-widget mb-30">
    <div class="sidebar-category">
        <ul>
            <li class="title"><i class="fa fa-bars"></i> Categorías</li>
            @foreach ($web_categories as $web_category)
            <li>
                <a href="{{route('web.get_products_category',$web_category)}}">
                    {{$web_category->name}}
                </a>
                <span>({{$web_category->products_count()}})</span>
            </li>
            @endforeach
        </ul>
    </div>
</div>