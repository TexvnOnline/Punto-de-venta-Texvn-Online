@extends('layouts.admin')
@section('title','Editar categoría')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Editar categoría
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar categoría</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($category,['route'=>['categories.update',$category], 'method'=>'PUT']) !!}
                        @if ($category->category_type == 'PRODUCT')
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" value="{{old('name',$category->name)}}" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="description">Descripción</label>
                          <textarea class="form-control" name="description" id="description" rows="3" required>{{old('name',$category->description)}}</textarea>
                        </div>
                            @if ($category->parent_id == null)
                            @include('admin.category._form')
                            @endif
                        @else
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" value="{{old('name',$category->name)}}" id="name" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                          <label for="description">Descripción</label>
                          <textarea class="form-control" name="description" id="description" rows="3" required>{{old('name',$category->description)}}</textarea>
                        </div>
                        @endif
                     <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                     <a href="{{ URL::previous() }}" class="btn btn-light">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('#icon').select2();
    });
</script>
@endsection
