@extends('layouts.admin')
@section('title','Gestión de redes sociales')
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
            Redes sociales
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Redes sociales</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="social_medias_listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Icono</th>
                                    <th>url</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($social_medias as $social_media)
                                <tr>
                                    <th scope="row">{{$social_media->id}}</th>
                                    <td>
                                        {{$social_media->name}}
                                    </td>
                                    <td>
                                        {{$social_media->icon}}
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{url($social_media->url)}}">{{url($social_media->url)}}</a>
                                    </td>
                                    <td style="width: 20%;">
                                       
                                        <form method="POST" action="{{route('social_medias.destroy',$social_media)}}" id="delete-item_{{$social_media->id}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <a class="btn btn-outline-info" title="Editar" href="{{route('social_medias.edit', $social_media)}}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        
                                        <button class="btn btn-outline-danger delete-confirm"
                                        type="button" onclick="confirmDelete('delete-item_{{$social_media->id}}')" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
{!! Html::script('js/my_functions.js') !!}
<script>
    $(document).ready(function() {
        var table = $('#social_medias_listing').DataTable({
            responsive: true,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            dom:
			"<'row'<'col-sm-2'l><'col-sm-7 text-right'B><'col-sm-3'f>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-5'i><'col-sm-7'p>>", 
            buttons: [
                {
                    text: '<i class="fas fa-plus"></i> Nuevo',
                    className: 'btn btn-info',
                    action: function ( e, dt, node, conf ) {
                        window.location.href = "{{route('social_medias.create')}}"
                    }
                }
            ]
        });
    });
</script>
@endsection
