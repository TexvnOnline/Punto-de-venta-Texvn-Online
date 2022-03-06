@extends('layouts.admin')
@section('title','Editar subcategoría')
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
            Editar subcategoría
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.show', $category)}}">{{$category->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar subcategoría</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    {{--  <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar categoría</h4>
                    </div>  --}}
                    {!! Form::model($subcategory,['route'=>['subcategories.update',$category, $subcategory], 'method'=>'PUT']) !!}
                    

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" value="{{$subcategory->name}}" class="form-control" placeholder="Nombre" required>
                      </div>
                      <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{$subcategory->description}}</textarea>
                    </div>
                    

                     <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                     <a href="{{ URL::previous() }}" class="btn btn-light">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$categories->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection
