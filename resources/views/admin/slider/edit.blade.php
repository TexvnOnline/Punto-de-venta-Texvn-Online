@extends('layouts.admin')
@section('title','Editar slider')
@section('styles')
{!! Html::style('summernote/summernote.min.css') !!}
{!! Html::style('fileinput/css/fileinput.min.css') !!}
<style>
    .kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
        margin: 0;
        padding: 0;
        border: none;
        box-shadow: none;
        text-align: center;
    }
    .kv-avatar {
        display: inline-block;
    }
    .kv-avatar .file-input {
        display: table-cell;
        width: ;
    }
    .kv-reqd {
        color: red;
        font-family: monospace;
        font-weight: normal;
    }
</style>
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Editar slider
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('sliders.index')}}">Registro de slider</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar slider</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    {!! Form::model($slider,['route'=>['sliders.update',$slider], 'method'=>'PUT','files' => true]) !!}


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="body">Contenido</label>
                              <textarea class="form-control summernote" name="body" id="body" rows="20">{!!$slider->body!!}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                
                                    <label for="file">Galería de imágenes</label>
                                    <div class="file-loading">
                                        <input id="file" name="file" type="file">
                                    </div>
                                
                            </div>
                        </div>
                    </div>

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

{{--  <button type="button" class="btn btn-primary">hola</button>  --}}

@endsection
@section('scripts')

{!! Html::script('summernote/summernote.min.js') !!}

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 210
        });
      });
</script>


{!! Html::script('fileinput/js/fileinput.min.js') !!}
{!! Html::script('fileinput/js/locales/es.js') !!}
{!! Html::script('fileinput/themes/fas/theme.js') !!}

<script>
    $(document).ready(function() {
        $("#file").fileinput({
            language: "es",
            theme: "fas",
            browseOnZoneClick: true,
            overwriteInitial: true,
            maxFileSize: 2500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="far fa-folder-open"></i>',
            removeIcon: '<i class="fas fa-times"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: "<img src='{{$slider->image->url}}' style='width: 100%'>",

            layoutTemplates: {main2: '{preview} ' + ' {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"],
            maxImageWidth: 160,
            maxImageHeight: 65
        });
    });
</script>
@endsection
