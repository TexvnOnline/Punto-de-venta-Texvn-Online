@extends('layouts.admin')
@section('title','Editar red social')
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
            Editar red social
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('social_medias.index')}}">Registro de red social</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar red social</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    {!! Form::model($social_media,['route'=>['social_medias.update',$social_media], 'method'=>'PUT']) !!}
                    @include('admin.social_media._form',[
                        'btnText' => 'Actualizar',
                    ])
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
