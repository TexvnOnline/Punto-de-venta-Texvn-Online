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
                            <li class="breadcrumb-item active" aria-current="page">login-register</li>
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
                
                <div class="col-lg-12">
                    <div class="login-reg-form-wrap  pr-lg-50">
                        <h2>{{ __('Verifique su dirección de correo electrónico') }}</h2>

                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                            </div>
                        @endif
    
                        {{ __('Antes de continuar, verifique su correo electrónico para ver si hay un enlace de verificación.') }}
                        {{ __('Si no recibió el correo electrónico') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('haga clic aquí para solicitar otro') }}</button>.
                        </form>
                    </div>
                </div>
                
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