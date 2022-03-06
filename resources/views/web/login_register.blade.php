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

<div class="container">
    @if (session('login_messages'))
    <div class="alert alert-danger rounded-0" role="alert">
        {{ session('login_messages') }}
    </div>
    @endif
</div>
<!-- login register wrapper start -->
<div class="login-register-wrapper">
    <div class="container">
        <div class="member-area-from-wrap">
            <div class="row">
                <!-- Login Content Start -->
                <div class="col-lg-6">
                    <div class="login-reg-form-wrap  pr-lg-50">
                        <h2>Iniciar sesión</h2>
                        <form  action="{{ route('login') }}" method="POST">
                        @csrf
                            <div class="single-input-item">
                                <input 
                                
                                type="email" 
                                name="email" 
                                placeholder="Correo electrónico" required />
                            </div>
                            <div class="single-input-item">
                                <input type="password" name="password" placeholder="Ingrese su contraseña" required />
                            </div>
                            <div class="single-input-item">
                                <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                    <div class="remember-meta">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rememberMe"  name="remember">
                                            <label class="custom-control-label" for="rememberMe">Recordarme</label>
                                        </div>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="forget-pwd">¿Olvidaste tu contraseña?</a>
                                </div>
                            </div>
                            <div class="single-input-item">
                                <button type="submit" class="sqr-btn">Iniciar sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login Content End -->

                <!-- Register Content Start -->
                <div class="col-lg-6">
                    <div class="login-reg-form-wrap mt-md-34 mt-sm-34">
                        <h2>Registro</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="text" name="name" placeholder="Nombre" required/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="text" name="surnames" placeholder="Apellidos" required/>
                                    </div>
                                </div>
                            </div>


                            <div class="single-input-item">
                                <input type="email" name="email" placeholder="Ingresa tu e-mail" required />
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="password" name="password" placeholder="Ingrese su contraseña" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="password" id="password-confirm" name="password_confirmation" placeholder="Repita su contraseña" required />
                                    </div>
                                </div>
                            </div>
                            <div class="single-input-item">
                                <div class="login-reg-form-meta">
                                    <div class="remember-meta">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="subnewsletter">
                                            <label class="custom-control-label" for="subnewsletter">Suscríbase a nuestro boletín</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-input-item">
                                <button type="submit" class="sqr-btn">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register Content End -->
            </div>
        </div>
    </div>
</div>
<!-- login register wrapper end -->

<!-- brand area start -->
@include('web._brand_area')
<!-- brand area end -->
@endsection
@section('scripts')
    
@endsection

