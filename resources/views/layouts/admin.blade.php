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
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    {!! Html::style('melody/vendors/iconfonts/font-awesome/css/all.min.css') !!}
    {!! Html::style('melody/vendors/css/vendor.bundle.base.css') !!}
    {!! Html::style('melody/vendors/css/vendor.bundle.addons.css') !!}
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    {!! Html::style('melody/css/style.css') !!}
    @yield('styles')
    <!-- endinject -->
    <link rel="shortcut icon" href="http://www.urbanui.com/" />
</head>

<body class="sidebar-fixed">
    <div class="container-scroller">


        <!-- modal -->
        <div class="modal fade" id="modalInicio" role="dialog">
            <div class="modal-dialog modal-lg">
              <!-- Modal content-->
             <div class="modal-content">
               

               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Información sobre la demo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
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


        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="https://www.youtube.com/channel/UCMWSlUcDJS00-5pmicciZ_w"><img src="{{asset('melody/images/logo.svg')}}"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{route('home')}}"><img src="{{asset('melody/images/logo-mini.svg')}}"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="fas fa-bars"></span>
                </button>
                {{--  <ul class="navbar-nav">
                    <li class="nav-item nav-search d-none d-md-flex">
                        <div class="nav-link">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search" aria-label="Search">
                            </div>
                        </div>
                    </li>
                </ul>  --}}

                

                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item d-none d-lg-flex">
                        <a class="nav-link" href="#"  data-toggle="modal" data-target="#modalInicio">
                          <span class="btn btn-primary">Demo</span>
                        </a>
                    </li>

                    @yield('create')

                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                          <i class="fas fa-bell mx-0"></i>
                            @if (auth()->user()->unreadNotifications->count() > 0)
                            <span class="count">
                                {{ auth()->user()->unreadNotifications->count()}}
                            </span> 
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                          <a class="dropdown-item" href="{{route('mark_all_notifications')}}">
                            <p class="mb-0 font-weight-normal float-left">Tienes {{ auth()->user()->unreadNotifications->count()}} notificaciones nuevas
                            </p>
                            <span class="badge badge-pill badge-warning float-right">
                                Ver todo
                            </span>
                          </a>
                          @foreach (auth()->user()->unreadNotifications as $notification)
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item preview-item" href="{{route('mark_a_notification',[$notification->id, $notification->data['id']])}}">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-danger">
                                <i class="fas {{$notification->data['icon']}} mx-0"></i>
                              </div>
                            </div>
                            <div class="preview-item-content">
                              <h6 class="preview-subject font-weight-medium">
                                {{$notification->data['title']}}
                              </h6>
                              <p class="font-weight-light small-text">
                                {{$notification->data['name']}} ha realizado un pedido por {{$notification->data['total']}} soles.
                              </p>
                            </div>
                          </a> 
                          @endforeach
                        </div>
                    </li>

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="{{asset('melody/images/faces/face16.jpg')}}" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            {{--  <a class="dropdown-item">
                                <i class="fas fa-cog text-primary"></i>
                                Settings
                            </a>  --}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"
                            onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                <i class="fas fa-power-off text-primary"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @yield('options')
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="fas fa-bars"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="fas fa-fill-drip"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close fa fa-times"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles primary"></div>
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            @yield('preference')
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('layouts._nav')
            <!-- partial -->
            <div class="main-panel">
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                            Todos los derechos reservados.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="https://www.youtube.com/channel/UCMWSlUcDJS00-5pmicciZ_w">Texvn Online</a> </> <i class="far fa-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    {!! Html::script('melody/vendors/js/vendor.bundle.base.js') !!}
    {!! Html::script('melody/vendors/js/vendor.bundle.addons.js') !!}
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    {!! Html::script('melody/js/off-canvas.js') !!}
    {!! Html::script('melody/js/hoverable-collapse.js') !!}
    {!! Html::script('melody/js/misc.js') !!}
    {!! Html::script('melody/js/settings.js') !!}
    {!! Html::script('melody/js/todolist.js') !!}

    @include('sweetalert::alert')

    <!-- endinject -->
    <!-- Custom js for this page-->
    {{--  {!! Html::script('melody/js/dashboard.js') !!}  --}}
    <!-- End custom js for this page-->
    @yield('scripts')
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
