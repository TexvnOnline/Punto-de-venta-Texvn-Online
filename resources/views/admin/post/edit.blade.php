@extends('layouts.admin')
@section('title','Modificar publicación')
@section('styles')
{!! Html::style('fileinput/css/fileinput.min.css') !!}
{!! Html::style('datetimepicker/build/jquery.datetimepicker.min.css') !!}
<link href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Modificar publicación
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Publicaciones</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modificar publicación</li>
            </ol>
        </nav>
    </div>
  

    {!! Form::model($post,['route'=>['posts.update',$post], 'method'=>'PUT']) !!}

    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <input type="hidden" id="csrf_token" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        class="form-control
                        @error('title') 
                            is-invalid 
                        @enderror
                        " 
                        value="{{old('title', $post->title)}}"
                        required>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                   

                    <div class="form-group">
                        <label for="excerpt">Resumen de publicación</label>
                        <textarea 
                        class="form-control
                        @error('excerpt') 
                            is-invalid 
                        @enderror
                        " 
                        name="excerpt" 
                        id="excerpt"
                        rows="3"
                        required
                        >{{old('excerpt', $post->excerpt)}}</textarea>
                        @error('excerpt')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <small id="helpId" class="text-muted">Se recomienda de 200 a 300 caracteres.</small>
                    </div>
                    <div class="form-group">
                        <label for="body">Contenido de publicación</label>
                        <textarea 
                        class="form-control
                        @error('body') 
                            is-invalid 
                        @enderror
                        " 
                        name="body" 
                        id="body"
                        rows="10"
                        required
                        >{{old('body', $post->body)}}</textarea>
                        @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="status">Estado de publicación</label>
                        <select class="form-control 
                        @error('status') 
                            is-invalid 
                        @enderror
                        " name="status" id="status" onchange="showInp()" required>
                        <option value="DRAFT"
                        {{old('status', $post->status) == 'DRAFT' ? 'selected' : ''}}
                        >Borrador</option>
                        <option value="PUBLIC"
                        {{old('status', $post->status) == 'PUBLIC' ? 'selected' : ''}}
                        >Publico</option>
                        <option value="HIDDEN"
                        {{old('status', $post->status) == 'HIDDEN' ? 'selected' : ''}}
                        >Oculto</option>
                        <option value="PROGRAM"
                        {{old('status', $post->status) == 'PROGRAM' ? 'selected' : ''}}
                        >Programar</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group" id="date_published_at">
                        <label for="published_at">Fecha de publicación</label>
                        <div class="input-group date datepicker">
                            <input type="text" 
                            id="datetimepicker-popup" 
                            name="published_at" 
                            class="form-control
                            @error('published_at') 
                                is-invalid 
                            @enderror
                            "
                            value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}"

                            >
                            <span class="input-group-addon input-group-append border-left">
                              <span class="far fa-calendar input-group-text"></span>
                            </span>
                        </div>

                    </div>


                    <div class="form-group">
                        <label for="category_id">Categoría</label>
                        <select 
                        class="select2
                        @error('category_id') 
                            is-invalid 
                        @enderror
                        " 
                        name="category_id" 
                        id="category_id" 
                        style="width: 100%">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" 
                                {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}
                                >{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tags">Etiquetas</label>
                        <select class="select2" 
                        name="tags[]" 
                        id="tags"
                        style="width: 100%" multiple>
                            @foreach ($tags as $tag)
                            <option value="{{$tag->id}}"
                                {{ collect(old('tags',  $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : ''}}
                                >{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="iframe">Iframe</label>
                      <textarea class="form-control" name="iframe" id="iframe" rows="7">{{old('iframe', $post->iframe)}}</textarea>
                    </div>


                </div>

                <div class="card-footer">
                

                    <a href="{{ URL::previous() }}" class="btn btn-info">Cancelar</a>

                    <button type="submit" class="btn btn-primary float-right">
                        Actualizar
                    </button>
               
                </div>
            </div>
        </div>
    </div>
    
    {!! Form::close() !!}

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card" id="gallery">
                <div class="card-body">

                    <label for="files">Galería de imágenes</label>
                    <div class="file-loading">
                        <input id="files" name="files[]" type="file" multiple>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
@section('scripts')
{!! Html::script('datetimepicker/build/jquery.datetimepicker.full.min.js') !!}
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
{!! Html::script('fileinput/js/fileinput.min.js') !!}
{!! Html::script('fileinput/js/locales/es.js') !!}
{!! Html::script('fileinput/themes/fas/theme.js') !!}

{!! Html::script('ckeditor/ckeditor.js') !!}
<script>
    CKEDITOR.replace('body');
</script>
<script>
    $(document).ready(function () {
        jQuery('#datetimepicker-popup').datetimepicker();
    });
</script>
<script>
    $(document).ready(function () {
        getSelectValue = document.getElementById("status").value;
        if(getSelectValue=="PROGRAM"){
            document.getElementById("date_published_at").style.display = "inline";
        }else{
            document.getElementById("date_published_at").style.display = "none";
        }
    });
</script>

<script>
    function showInp(){
        getSelectValue = document.getElementById("status").value;
        console.log(getSelectValue);
        if(getSelectValue=="PROGRAM"){
          document.getElementById("date_published_at").style.display = "inline";
        }else{
          document.getElementById("date_published_at").style.display = "none";
        }
    }
</script>

<script>
    $(document).ready(function () {
        $('#category_id').select2();
        $('#tags').select2();
    });
</script>
<script>
    $(document).ready(function() {
        var krajeeGetCount = function(id) {
            var cnt = $('#' + id).fileinput('getFilesCount');
            return cnt === 0 ? 'You have no files remaining.' :
                'You have ' +  cnt + ' file' + (cnt > 1 ? 's' : '') + ' remaining.';
        };
        $("#files").fileinput({
            language: "es",
            theme: "fas",
            browseOnZoneClick: true,
            uploadUrl: "/upload_image/{{$post->id}}/",

            uploadExtraData:{'_token':$("#csrf_token").val()},

            initialPreview: [
                <?php foreach ($post->images as $image)
                {
                    echo '"'.$image->url.'",';
                } ?>
            ],
            initialPreviewAsData: true,
            initialPreviewFileType: 'image',
            initialPreviewConfig: [<?php foreach ($post->images as $image)
            {
                echo '{width:"120px",key:'.$image->id.'},';
            } ?>],
            overwriteInitial: false,
            maxFileSize: 2100,
            browseClass: "btn btn-primary btn-block",
            showCaption: false,
            showRemove: false,
            showUpload: false,
            deleteUrl: "/file_delete",
            deleteExtraData:{'_token':$("#csrf_token").val()},
        }).on('filebeforedelete', function() {
            return new Promise(function(resolve, reject) {
                $.confirm({
                    title: 'Confirmation!',
                    content: 'Are you sure you want to delete this file?',
                    type: 'red',
                    buttons: {   
                        ok: {
                            btnClass: 'btn-primary text-white',
                            keys: ['enter'],
                            action: function(){
                                resolve();
                            }
                        },
                        cancel: function(){
                            $.alert('File deletion was aborted! ' + krajeeGetCount('file-6'));
                        }
                    }
                });
            });
        }).on('filedeleted', function() {
            setTimeout(function() {
                $.alert('File deletion was successful! ' + krajeeGetCount('file-6'));
            }, 900);
        });
    });
</script>
@endsection