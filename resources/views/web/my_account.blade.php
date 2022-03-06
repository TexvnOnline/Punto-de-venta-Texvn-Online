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
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">my account</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- my account wrapper start -->
<div class="my-account-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad"><i class="fa fa-dashboard"></i>
                                    Dashboard</a>
                                {{--  <a href="#orders"><i class="fa fa-cart-arrow-down"></i> Orders</a>  --}}
                                <a href="{{route('web.orders')}}"
                                class="{!! active_class(route('web.orders')) !!}"
                                ><i class="fa fa-cart-arrow-down"></i> Pedidos</a>
                                {{--  <a href="#download"><i class="fa fa-cloud-download"></i> Download</a>  --}}
                                
                                

                                <a href="{{route('web.address_edit')}}"
                                class="{!! active_class(route('web.address_edit')) !!}"
                                ><i class="fa fa-map-marker"></i> Dirección</a>
                                <a href="{{route('web.account_info')}}"
                                class="{!! active_class(route('web.account_info')) !!}"
                                ><i class="fa fa-user"></i> Detalles de la cuenta</a>
                                <a 
                                class="{!! active_class(route('web.change_password')) !!}"
                                href="{{route('web.change_password')}}"><i class="fa fa-credit-card"></i> Cambiar contraseña</a>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>  Cerrar sesión</a>
                                
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        <!-- My Account Tab Menu End -->

                        <!-- My Account Tab Content Start -->
                        @yield('content_tab')
                        <!-- My Account Tab Content End -->
                    </div>
                </div> <!-- My Account Page End -->
            </div>
        </div>
    </div>
</div>
<!-- my account wrapper end -->

<!-- brand area start -->
@include('web._brand_area')
<!-- brand area end -->
@endsection
@section('scripts')
    
@endsection