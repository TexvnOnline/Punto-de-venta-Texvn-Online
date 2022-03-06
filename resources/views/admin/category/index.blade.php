@extends('layouts.admin')
@section('title','Gestión de categorías')
@section('styles')
{!! Html::style('treegrid/css/jquery.treegrid.css') !!}
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Categorías
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categorías</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title"></h4>
                        <div class="btn-group">
                            <a href="{{route('categories.create')}}" type="button" class="btn btn-info ">
                                <i class="fas fa-plus"></i> Nuevo
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="category_listing" class="table tree">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Modulo</th>
                                    <th>Cantidad</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                @include('admin.category._category_list', [
                                    'item' => $category,
                                    'form_number' => '0'
                                ])
                                @if ($category->has_subcategory())
                                    @foreach ($category->subcategories as $subcategory_1)
                                    @include('admin.category._category_list', [
                                        'item' => $subcategory_1,
                                        'form_number' => '1'
                                    ])
                                    @if ($subcategory_1->has_subcategory())
                                        @foreach ($subcategory_1->subcategories as $subcategory_2)
                                        @include('admin.category._category_list', [
                                            'item' => $subcategory_2,
                                            'form_number' => '2'
                                        ])
                                        @endforeach
                                    @endif
                                    @endforeach
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    {{$categories->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

{!! Html::script('treegrid/js/jquery.treegrid.js') !!}
{!! Html::script('js/my_functions.js') !!}
<script type="text/javascript">
    $(document).ready(function() {
        $('.tree').treegrid().treegrid('collapseAll');
    });
</script>
@endsection
