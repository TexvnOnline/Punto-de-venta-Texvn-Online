<div class="main-menu">
    <nav id="mobile-menu">
        <ul>

            <li class="
            {!! active_class(route('web.welcome')) !!}
            ">
                <a href="{{route('web.welcome')}}">
                    <i class="fa fa-home"></i>Inicio
                </a>
            </li>

            <li class="
            {!! active_class(route('web.shop_grid')) !!}
            ">
                <a href="{{route('web.shop_grid')}}">
                    {{--  <i class="fa fa-shopping-bag"></i>  --}}
                    Tienda
                </a>
            </li>
            
            <li class="
            {!! active_class(route('web.blog')) !!}
            ">
                <a href="{{route('web.blog')}}">
                    {{--  <i class="fa fa-book"></i>  --}}
                    Blog
                </a>
            </li>
            <li>
                <a href="{{route('web.contact_us')}}">
                    Contáctanos
                </a>
            </li>
            <li>
                <a href="{{route('web.about_us')}}">
                    sobre nosotros
                </a>
            </li>
        </ul>
    </nav>
</div>