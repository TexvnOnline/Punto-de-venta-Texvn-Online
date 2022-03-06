<?php
  $exibirModal = false;
  if(!isset($_COOKIE["mostrarModal"]))
  {
    $expirar = 3600;
    setcookie('mostrarModal', 'SI', (time() + $expirar));
    $exibirModal = true;
  }
?>
<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'TexvnOnline')">
    @stack('meta')
    <title>
        @yield('title', config('app.name'))
    </title>
    <link rel="shortcut icon" href="{!!asset('galio/assets/img/favicon.ico')!!}" type="image/x-icon" />
    {!! Html::style('galio/assets/css/bootstrap.min.css') !!}
    {!! Html::style('galio/assets/css/font-awesome.min.css') !!}
    {!! Html::style('galio/assets/css/helper.min.css') !!}
    {!! Html::style('galio/assets/css/plugins.css') !!}
    {!! Html::style('galio/assets/css/style.css') !!}
    <style>
        .tt-query {
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
               -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          }
          .tt-hint {
            color: #999
          }
          .tt-menu {
            width: 100% ;
            margin-top: 4px;
            padding: 4px 0;
            background-color: #f8f8f8;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-border-radius: 0px;
               -moz-border-radius: 0px;
                    border-radius: 0px;
            -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
               -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                    box-shadow: 0 5px 10px rgba(0,0,0,.2);
          }
          .tt-suggestion {
            padding: 3px 20px;
            line-height: 24px;
          }
          .tt-suggestion.tt-cursor,.tt-suggestion:hover {
            color: #f8f8f8;
            background-color: #001123;
          
          }
          .tt-suggestion p {
            margin: 0;
          }
    </style>
    {!! Html::style('bootstrap_star_rating/css/star-rating.css') !!}
    {!! Html::style('bootstrap_star_rating/themes/krajee-fa/theme.css') !!}
    @yield('styles')
    @stack('styles')
</head>
<body>
    <div class="wrapper box-layout">
        <!-- modal -->
        <div class="modal fade" id="modalInicio" role="dialog">
            <div class="modal-dialog modal-lg">
              <!-- Modal content-->
             <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Información sobre la demo</h4>
               </div>
               <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">  
                            <h4>Videos del curso en <a href="https://youtube.com/playlist?list=PL33d8DmxxcSNNIA6DVZ5Xrx50IGsyGfUt" target="_black">TEXVN ONLINE</a></h4>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/videoseries?list=PL33d8DmxxcSNNIA6DVZ5Xrx50IGsyGfUt" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <h3>Restricciones</h3>
                            <p>Para evitar la alteración de la información, la demo no guarda los cambios de edición, creación y eliminación de los siguientes módulos.</p>
                        </div>
                        <div class="col-md-4 mt-3">
                            <ul class="list-group list-group-flush">
                                <p><strong><i class="fa fa-check"></i> Productos</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Categorías</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Etiquetas</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Marcas</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Publicaciones</strong> </p>
                               
                            </ul>
                        </div>
                        <div class="col-md-4 mt-3">
                            <ul class="list-group list-group-flush">
                                <p><strong><i class="fa fa-check"></i> Productos</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Categorías</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Etiquetas</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Marcas</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Publicaciones</strong> </p>
                               
                            </ul>
                        </div>
                        <div class="col-md-4 mt-3">
                            <ul class="list-group list-group-flush">
                                <p><strong><i class="fa fa-check"></i> Redes sociales</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Sliders</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Redes sociales</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Sliders</strong> </p>
                            </ul>
                        </div>
                        <div class="col-md-12 mt-3">
                            <h3>Credenciales para realizar pruebas de pago </h3>
                        </div>
                        <div class="col-md-6 mt-3">
                            <p><strong>PayPal</strong><br>
                            <strong>Correo electrónico: </strong> sb-hqdis5181449@personal.example.com<br>
                            <strong>Contraseña: </strong> pf>e0Q=V<br>
                        </p>
                        </div>
                        <div class="col-md-6 mt-3">
                            <p><strong>Stripe</strong><br>
                            <strong>Número de tarjeta: </strong> 4242 4242 4242 4242 <br>
                            <strong>MM/YY CVC: </strong> 04/24 242 42424 <br>
                        </p>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p><strong>Mercado pago</strong><br>
                            <strong>Número: </strong> 5031 7557 3453 0604 <br>
                            <strong>Código de seguridad: </strong> 123 <br>
                            <strong>Fecha de vencimiento: </strong> 11/25 <br>
                        </p>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p><strong>PayU</strong><br>
                            <strong>Tarjeta: </strong> Visa <br>
                            <strong>Número: </strong> 4009 1753 3280 6176 <br>
                            <strong>Código de seguridad: </strong> 123 <br>
                            <strong>MM: </strong> 11 <br>
                            <strong>YY: </strong> 25 <br>
                            </p>
                        </div>

                        <div class="col-md-12 mt-3">
                            <h4>Credenciales de usuario</h4>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Administrador</strong></p>
                            <p><strong>Correo: Admin@gmail.com</strong> </p>
                            <p><strong>Contraseña: 123456789</strong> </p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Cajero</strong></p>
                            <p><strong>Correo: Cashier@gmail.com</strong> </p>
                            <p><strong>Contraseña: 123456789</strong> </p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Cliente</strong></p>
                            <p><strong>Correo: Client@gmail.com</strong> </p>
                            <p><strong>Contraseña: 123456789</strong> </p>
                        </div>



                        <div class="col-md-12 mt-3">
                            <h4>Panel administrador</h4>
                            <p>Recuerda que para acceder al panel administrador debes usar las credenciales de administrador y cerrar sesión como cliente, de lo contrario no tendrás permisos para ver ni realizar ninguna acción en el panel administrador.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('login')}}" class="sqr-btn">Ir al panel administrador </a>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Correo: Admin@gmail.com</strong> </p>
                            <p><strong>Contraseña: 123456789</strong> </p>
                        </div>

                        <div class="col-md-12 mt-3">
                            <h4>Videos del curso </h4>

                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/videoseries?list=PL33d8DmxxcSNNIA6DVZ5Xrx50IGsyGfUt" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
        </div>
        <!-- fin modal -->
        <!-- header area start -->
        <header>

            <!-- header top start -->
            <div class="header-top-area bg-gray text-center text-md-left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-5">
                            <div class="header-call-action">
                                <a href="mailto:{{$web_company->email}}">
                                    <i class="fa fa-envelope"></i>
                                    {{$web_company->email}}
                                </a>
                                <a href="tel:{{$web_company->phone}}">
                                    <i class="fa fa-phone"></i>
                                    {{$web_company->phone}}
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7">
                            <div class="header-top-right float-md-right float-none">
                                <nav>
                                    <ul>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#modalInicio">
                                            Demo
                                        </a>
                                    </li>
                                    @guest
                                    <li>
                                        <a href="{{ route('web.login_register') }}">Iniciar sesión</a>
                                    </li>
                                    <li>
                                        <a  href="{{ route('web.login_register') }}">Registro</a>
                                    </li>
                                    @else
                                    <li>
                                        <div class="dropdown header-top-dropdown">
                                            <a class="dropdown-toggle" id="myaccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Mi cuenta
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="myaccount">
                                                <a class="dropdown-item" href="{{route('web.my_account')}}">Mi cuenta</a>
                                                <a class="dropdown-item" href="{{route('web.orders')}}"> Pedidos</a>
                                                
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">Cerrar sesión</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>  
                                            </div>
                                        </div>
                                    </li>
                                    @endguest
                                        <li>
                                            <a href="{{route('web.cart')}}">Mi Carrito</a>
                                        </li>
                                        {{-- @if ($shopping_cart->has_products())
                                        <li>
                                            <a href="{{route('web.checkout')}}">Pagos</a>
                                        </li>
                                        @endif --}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header top end -->

            <!-- header middle start -->
            <div class="header-middle-area pt-20 pb-20">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="brand-logo">
                                <a href="{{route('web.welcome')}}">
                                    <img src="{!!asset('galio/assets/img/logo/logo3.png')!!}" alt="{{$web_company->name}}">
                                </a>
                            </div>
                        </div> <!-- end logo area -->
                        <div class="col-lg-9">
                            <div class="header-middle-right">
                                <div class="header-middle-shipping mb-20">
                                    <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h5>Horario de atención</h5>
                                            <span>Lun a dom: 8.00-18.00</span>
                                        </div>
                                    </div> <!-- end single shipping -->
                                    <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h5>envío gratis</h5>
                                            <span>En pedidos superiores a $199</span>
                                        </div>
                                    </div> <!-- end single shipping -->
                                    <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h5>devoluciones</h5>
                                            <span>Dentro de los 30 días posteriores</span>
                                        </div>
                                    </div> <!-- end single shipping -->
                                </div>
                                <div class="header-middle-block">
                                   
                                    @include('layouts._search_products')
                                    
                                    @include('layouts._mini_cart')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header middle end -->

            <!-- main menu area start -->
            <div class="main-header-wrapper bdr-bottom1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-header-inner">

                                @include('layouts._category_toggle_wrap')

                                @include('layouts._main_menu')
                            </div>
                        </div>
                        <div class="col-12 d-block d-lg-none"><div class="mobile-menu"></div></div>
                    </div>
                </div>
            </div>
            <!-- main menu area end -->

        </header>
        <!-- header area end -->
        @yield('content')
        <!-- footer area start -->

        @stack('modal')

        <footer>
            <!-- footer top start -->
            
            <div class="footer-top bg-black pt-14 pb-14">
                <div class="container">
                   @if (session('mensaje'))
                    <div class="alert alert-success rounded-0" role="alert">
                    {{session('mensaje')}}
                    </div>
                   @endif
                   @if ($errors->has('subscription_email'))
                    <div class="alert alert-danger rounded-0" role="alert">
                        {{ $errors->first('subscription_email') }}
                    </div>
                   @endif 
                    
                    <div class="footer-top-wrapper">
                        <div class="newsletter__wrap">
                            <div class="newsletter__title">
                                <div class="newsletter__icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="newsletter__content">
                                    <h3>Suscribirse al boletín</h3>
                                    <p>Duis autem vel eum iriureDuis autem vel eum</p>
                                </div>
                            </div>
                            <div class="newsletter__box">
                                <form action="{{route('web.subscription_email')}}" method="POST">
                                    @csrf
                                    <input type="email" name="subscription_email" autocomplete="off" placeholder="Email">
                                    <button type="submit">subscribe!</button>
                                </form>
                            </div>
                            
                        </div>

                        <div class="social-icons">
                            @foreach ($web_social_networks as $web_social_network)
                            <a href="{{url($web_social_network->url)}}" data-toggle="tooltip" data-placement="top" title="{{$web_social_network->name}}" target="_blank"><i class="fa {{$web_social_network->icon}}"></i></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer top end -->

            <!-- footer main start -->
            <div class="footer-widget-area pt-40 pb-38 pb-sm-4 pt-sm-30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>CONTACTO</h4>
                                </div>
                                <div class="widget-body">
                                    <ul class="location">
                                        <li>
                                            <i class="fa fa-envelope"></i>
                                            {{$web_company->email}}
                                        </li>
                                        <li>
                                            <i class="fa fa-phone"></i>
                                            {{$web_company->phone}}
                                        </li>
                                        <li>
                                            <i class="fa fa-map-marker"></i>
                                            Dirección:  {{$web_company->address}}
                                        </li>
                                    </ul>
                                    <a class="map-btn" href="{{url($web_company->google_maps_link)}}" target="_blank">Abrir en Google Map</a>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>Mi cuenta</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        @guest
                                        <li><a href="{{route('web.login_register')}}">Iniciar sesión</a></li>
                                        <li><a href="{{route('web.login_register')}}">Registro</a></li>
                                        @else
                                        <li><a href="{{route('web.my_account')}}">Mi cuenta</a></li>
                                        {{--  @if ($shopping_cart->has_products())
                                        <li><a href="{{route('web.checkout')}}">Pagar</a></li>
                                        @endif  --}}
                                       
                                        <li><a href="{{route('web.orders')}}">Mis ordenes</a></li>
                                        @endguest
                                        <li><a href="{{route('web.cart')}}">mi carrito</a></li>

                                    </ul>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>Categorías populares</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        {{-- TRAER 5 CATEGORIAS --}}
                                        {{-- @foreach ($web_categories->take(5) as $web_category)
                                            <li>
                                                <a href="{{route('web.get_products_category', $web_category)}}">
                                                    {{$web_category->name}}
                                                </a>
                                            </li>
                                        @endforeach --}}
                                    </ul>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>Etiquetas populares</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        {{-- @foreach ($web_tags_products->take(5) as $web_tag_product)
                                        <li>
                                            <a href="{{route('web.get_products_tag', $web_tag_product)}}">
                                                {{$web_tag_product->name}}
                                            </a>
                                        </li>
                                        @endforeach --}}
                                    </ul>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                    </div>
                </div>
            </div>
            <!-- footer main end -->

            <!-- footer bootom start -->
            <div class="footer-bottom-area bg-gray pt-20 pb-20">
                <div class="container">
                    <div class="footer-bottom-wrap">
                        <div class="copyright-text">
                            <p><a target="_blank" href="https://www.youtube.com/channel/UCMWSlUcDJS00-5pmicciZ_w">Texvn Online</a></p>
                        </div>
                        <div class="payment-method-img">
                            @foreach ($web_payment_methods as $web_payment_method)
                            <img src="/{{$web_payment_method->image}}" alt="{{$web_payment_method->name}}">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer bootom end -->

        </footer>
        <!-- footer area end -->

    </div>


    <!-- Quick view modal start -->
    {{--  @include('web._modal_quick_view')  --}}
    <!-- Quick view modal end -->

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->




    <!--All jQuery, Third Party Plugins & Activation (main.js) Files-->
    {!! Html::script('galio/assets/js/vendor/modernizr-3.6.0.min.js') !!}
    <!-- Jquery Min Js -->
    {!! Html::script('galio/assets/js/vendor/jquery-3.3.1.min.js') !!}
    <!-- Popper Min Js -->
    {!! Html::script('galio/assets/js/vendor/popper.min.js') !!}
    <!-- Bootstrap Min Js -->
    {!! Html::script('galio/assets/js/vendor/bootstrap.min.js') !!}
    <!-- Plugins Js-->
    {!! Html::script('galio/assets/js/plugins.js') !!}
    <!-- Ajax Mail Js -->
    {!! Html::script('galio/assets/js/ajax-mail.js') !!}
    <!-- Active Js -->
    {!! Html::script('galio/assets/js/main.js') !!}
    {{--  {!! Html::script('galio/assets/js/main.js') !!}  --}}
    <!-- Switcher JS [Please Remove this when Choose your Final Projct] -->
    {!! Html::script('galio/assets/js/switcher.js') !!}

    {!! Html::script('js/typeahead.bundle.min.js') !!}

    {!! Html::script('bootstrap_star_rating/js/star-rating.js') !!}
    {!! Html::script('bootstrap_star_rating/js/locales/es.js') !!}
    {!! Html::script('bootstrap_star_rating/themes/krajee-fa/theme.js') !!}

    @include('sweetalert::alert')
    
    @yield('scripts')
    @stack('scripts')

    @if ($exibirModal === true)
    <script>
        $(document).ready(function()
        {
          $("#modalInicio").modal("show");
        });
    </script>
    @endif
    
</body>


</html>