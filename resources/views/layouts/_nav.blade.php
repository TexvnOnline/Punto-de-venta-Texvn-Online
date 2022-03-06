<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="{{asset('melody/images/faces/face16.jpg')}}" alt="image" />
                </div>
                <div class="profile-name">
                    <p class="name">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="designation">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>
        </li>
        @can('home')
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @endcan
        {{--  @can('reports.day' || 'reports.date' || 'report.results')  --}}
        <li class="nav-item">
           
            <a class="nav-link" data-toggle="collapse" href="#page-layouts1" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fas fa-chart-line menu-icon"></i>
                <span class="menu-title">Reportes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts1">
                <ul class="nav flex-column sub-menu">
                    @can('reports.day')
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('reports.day')}}">Reportes por día</a>
                    </li>
                    @endcan
                    @can('reports.date')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('reports.date')}}">Reportes por fecha</a>
                    </li>
                    @endcan
                </ul>
            </div>
        </li>
        {{--  @endcan  --}}
        @can('purchases.index')
        <li class="nav-item">
            <a class="nav-link" href="{{route('purchases.index')}}">
                <i class="fas fa-cart-plus menu-icon"></i>
                <span class="menu-title">Compras</span>
            </a>
        </li>
        @endcan
        @can('sales.index')
        <li class="nav-item">
            <a class="nav-link" href="{{route('sales.index')}}">
                <i class="fas fa-shopping-cart menu-icon"></i>
                <span class="menu-title">Ventas</span>
            </a>
        </li>
        @endcan
        @can('orders.index')
        <li class="nav-item">
            <a class="nav-link" href="{{route('orders.index')}}">
                <i class="fas fa-shipping-fast menu-icon"></i>

                <span class="menu-title">Pedidos</span>
            </a>
        </li>
        @endcan

        {{--  @can('products.index' ||
            'categories.index' ||
            'tags.index' ||
            'brands.index'
            )  --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#inventario" aria-expanded="false"
                aria-controls="inventario">
                <i class="fas fa-boxes menu-icon menu-icon"></i>
                <span class="menu-title">Inventario</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="inventario">
                <ul class="nav flex-column sub-menu">
                    @can('products.index')
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('products.index')}}">Productos</a>
                    </li>
                    @endcan
                    @can('categories.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories.index')}}">Categorías</a>
                    </li>
                    @endcan
                    @can('tags.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tags.index')}}">Etiquetas</a>
                    </li>
                    @endcan
                    @can('brands.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('brands.index')}}">Marcas</a>
                    </li>
                    @endcan
                </ul>
            </div>
        </li>
        {{--  @endcan  --}}
       
        @can('posts.index')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false"
                aria-controls="blog">
                <i class="fas fa-book menu-icon menu-icon"></i>
                
                <span class="menu-title">Blog</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="blog">
                <ul class="nav flex-column sub-menu">
                    @can('posts.index')
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('posts.index')}}">Publicaciones</a>
                    </li> 
                    @endcan
                </ul>
            </div>
        </li> 
        @endcan
       
        {{--  @can(
            'social_medias.index' ||
            'sliders.index' ||
            'subscriptions.index' ||
            'promotions.index'
            )  --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#eCommerce" aria-expanded="false"
                    aria-controls="eCommerce">
                    <i class="fas fa-shopping-bag menu-icon menu-icon"></i>
                    <span class="menu-title">eCommerce</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="eCommerce">
                    <ul class="nav flex-column sub-menu">
                        @can('social_medias.index')
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="{{route('social_medias.index')}}">Redes sociales</a>
                        </li>  
                        @endcan
                        @can('sliders.index')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('sliders.index')}}">Sliders</a>
                        </li>
                        @endcan
                        @can('subscriptions.index')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('subscriptions.index')}}">Suscripciones</a>
                        </li>  
                        @endcan
                        @can('promotions.index')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('promotions.index')}}">Promociones</a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
        {{--  @endcan  --}}
        @can('clients.index')
        <li class="nav-item">
            <a class="nav-link" href="{{route('clients.index')}}">
                <i class="fas fa-users menu-icon"></i>
                <span class="menu-title">Clientes</span>
            </a>
        </li>
        @endcan
       
        @can('providers.index')
        <li class="nav-item">
            <a class="nav-link" href="{{route('providers.index')}}">
                <i class="fas fa-shipping-fast menu-icon"></i>
                <span class="menu-title">Proveedores</span>
            </a>
        </li>  
        @endcan
        @can('users.index')
        <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}">
                <i class="fas fa-user-tag menu-icon"></i>
                <span class="menu-title">Usuarios</span>
            </a>
        </li>
        @endcan
        @can('roles.index')
        <li class="nav-item">
            <a class="nav-link" href="{{route('roles.index')}}">
                <i class="fas fa-user-cog menu-icon"></i>
                <span class="menu-title">Roles</span>
            </a>
        </li>
        @endcan
        {{--  @can(
            'business.index' ||
            'printers.index'
            )  --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fas fa-cogs menu-icon"></i>
                <span class="menu-title">Configuración</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    @can('business.index')
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('business.index')}}">Empresa</a>
                    </li> 
                    @endcan
                    @can('printers.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('printers.index')}}">Impresora</a>
                    </li> 
                    @endcan
                </ul>
            </div>
        </li> 
        {{--  @endcan  --}}
        <li class="nav-item">
            <a class="nav-link" href="https://www.youtube.com/channel/UCMWSlUcDJS00-5pmicciZ_w">
                <i class="fab fa-youtube menu-icon"></i>
                <span class="menu-title">YouTube</span>
            </a>
        </li>
    </ul>
</nav>
