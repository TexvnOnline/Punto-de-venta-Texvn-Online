@extends('layouts.admin')
@section('title','información de producto')
@section('styles')

@endsection
@section('create')

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{$product->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">

                                <img src="{{asset('image/'.$product->image)}}" alt="profile" class="img-lg  mb-3" />
                                {{--  <p>Nombre de proveedor. </p>  --}}


                                <h3>{{$product->name}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            {{--  <div class="border-bottom py-4">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        Sobre producto
                                    </button>
                                    <button type="button"
                                        class="list-group-item list-group-item-action">Productos</button>
                                    <button type="button" class="list-group-item list-group-item-action">Registrar
                                        producto</button>
                                </div>
                            </div>  --}}

                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                        Status
                                    </span>
                                    <span class="float-right text-muted">
                                        {{$product->status}}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Proveedor
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="{{route('providers.show',$product->provider->id)}}">
                                        {{$product->provider->name}}
                                        </a>
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Categoría
                                    </span>
                                    <span class="float-right text-muted">
                                        {{--  PRODUCTOS POR CATEGORIA  --}}
                                        <a href="">
                                            {{$product->category->name}}
                                        </a>
                                    </span>
                                </p>
                                {{--  <p class="clearfix">
                                    <span class="float-left">
                                        Facebook
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="#">David Grey</a>
                                    </span>
                                </p>  --}}
                                {{--  <p class="clearfix">
                                    <span class="float-left">
                                        Twitter
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="#">@davidgrey</a>
                                    </span>
                                </p>  --}}
                            </div>

                            {{--  <button class="btn btn-primary btn-block">{{$product->status}}</button>  --}}
                            @if ($product->status == 'ACTIVE')
                            <a href="{{route('change.status.products', $product)}}" class="btn btn-success btn-block">Activo</a>
                            @else
                            <a href="{{route('change.status.products', $product)}}" class="btn btn-danger btn-block">Desactivado</a>
                            @endif
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información de producto</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Código</strong>
                                        <p class="text-muted">
                                            {{$product->code}}
                                        </p>
                                        <hr>
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Stock</strong>
                                        <p class="text-muted">
                                            {{$product->stock}}
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong>
                                            <i class="fas fa-mobile mr-1"></i>
                                            Precio de venta</strong>
                                        <p class="text-muted">
                                            {{$product->sell_price}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-envelope mr-1"></i> Código de barras</strong>
                                        <p class="text-muted">
                                            {!!DNS1D::getBarcodeHTML($product->code, 'EAN13'); !!}
                                        </p>
                                        <hr>
                                        {{--  <strong><i class="fas fa-map-marked-alt mr-1"></i> Categoría</strong>
                                        <p class="text-muted">
                                            {{$product->category->name}}
                                        </p>
                                        <hr>  --}}
                                        {{--  <strong><i class="fas fa-map-marked-alt mr-1"></i> Proveedor</strong>
                                        <p class="text-muted">
                                            {{$product->provider->name}}
                                        </p>
                                        <hr>  --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('products.index')}}" class="btn btn-primary float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
{!! Html::script('melody/js/data-table.js') !!}
@endsection
