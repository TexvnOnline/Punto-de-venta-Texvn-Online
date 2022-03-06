@extends('layouts.admin')
@section('title','Categoría' .$category->name)
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
            Detalles de categoría {{$category->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Productos de {{$category->name}}</h4>
                    </div>
                    <div class="table-responsive">
                        <table id="products_listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Precio de venta</th>
                                    <th>Stock</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>
                                        <a target="_blank" title="Vista previa" href="{{route('web.product_details',$product)}}">{{$product->name}}</a>
                                    </td>
                                    <td>{{$product->sell_price}}</td>
                                    <td>{{$product->stock}}</td>
                                    <td class="second_td">
                                        <a 
                                        href="#"
                                        id="username" 
                                        class="editable"
                                        data-type="select" 
                                        data-pk="{{$product->id}}" 
                                        data-url="{{url("/update_product_status/$product->id")}}" 
                                        data-title="Estado"
                                        data-value="{{ $product->status }}"
                                        >{{$product->product_status()}}
                                        </a>
                                    </td>
                                    <td>
                                        {!! Form::open(['route'=>['products.destroy',$product], 'method'=>'DELETE']) !!}
                                        <a class="btn btn-outline-info" title="Editar" href="{{route('products.edit', $product)}}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-outline-danger delete-confirm"
                                        data-name="{{ $product->name }}" title="Eliminar">
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
                    <a href="{{ URL::previous() }}" class="btn btn-light float-right">
                        Regresar
                    </a>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('.delete-confirm').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `¿Estás seguro de que quieres eliminar ${name}?`,
            text: "Si borra esto, desaparecerá para siempre.",
            icon: "warning",
            buttons: true,
            buttons: ["Cancelar", "¡Sí!"],
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
          }
        });
    });
</script>
<script>
    $(document).ready(function() {
        var table = $('#products_listing').DataTable({
            responsive: true,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>
@endsection
