@extends('layouts.admin')
@section('title','Productos de categoría')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
      }
</style>
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
            Productos que pertenecen a {{$category->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Productos de la categoría {{$category->name}}</h4>
                        {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="{{route('products.create')}}" class="dropdown-item">Agregar</a>
                              <a class="dropdown-item" href="{{route('print_barcode')}}">Exportar códigos de barras</a> 
                              {{--  <button class="dropdown-item" type="button">Another action</button>
                              <button class="dropdown-item" type="button">Something else here</button>  --}}
                            </div>
                          </div>
                    </div>

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Estado</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category->products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>
                                        <a href="{{route('products.show',$product)}}">{{$product->name}}</a>
                                    </td>
                                    <td>{{$product->stock}}</td>
                                    @if ($product->status == 'ACTIVE')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{route('change.status.products', $product)}}" title="Editar">
                                            Activo <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{route('change.status.products', $product)}}" title="Editar">
                                            Desactivado <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif
                                    

                                    <td>{{$product->category->name}}</td>
                                    <td style="width: 50px;">
                                        {!! Form::open(['route'=>['products.destroy',$product], 'method'=>'DELETE']) !!}

                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('products.edit', $product)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        
                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('categories.index')}}" class="btn btn-primary float-right">Regresar</a>
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
