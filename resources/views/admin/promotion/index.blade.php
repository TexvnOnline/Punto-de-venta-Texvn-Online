@extends('layouts.admin')
@section('title','Gestión de premociones')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap4.min.css">
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Premociones
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Premociones</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="promotions_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2">Id</th>
                                    <th rowspan="2">Nombre</th>
                                    <th colspan="2" class="text-center">
                                        Descuentos
                                    </th>
                                    <th rowspan="2">Inicio</th>
                                    <th rowspan="2">Final</th>
                                    <th rowspan="2">Estado</th>
                                    <th rowspan="2">Acciones</th>
                                </tr>
                                <tr>
                                    <th>Porcentaje</th>
                                    <th>Monto fijo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promotions as $promotion)
                                <tr>
                                    <th scope="row">{{$promotion->id}}</th>
                                    <td>
                                        {{$promotion->name}}
                                    </td>
                                    <td>{{$promotion->discount_rate}}
                                        <span class="float-right">
                                            <i class="fas {{$promotion->active_type()['icon_1']}}"></i>
                                        </span>
                                        
                                    </td>
                                    <td>{{$promotion->fixed_amount_discount}}
                                        <span  class="float-right">
                                            <i class="fas {{$promotion->active_type()['icon_2']}}"></i>
                                        </span>
                                    </td>
                                    <td>{{$promotion->start_date->format('Y/m/d H:i')}}</td>
                                    <td>{{$promotion->ending_date->format('Y/m/d H:i')}}</td>
                                        <td>
                                            <label class="badge badge-{{$promotion->promotion_status()['color']}} badge-pill">
                                                {{$promotion->promotion_status()['text']}}
                                            </label>
                                        </td>
                                    <td style="width: 20%;">

                                        <form method="POST" action="{{route('promotions.destroy',$promotion)}}" id="delete-item_{{$promotion->id}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <a class="btn btn-outline-info" href="{{route('promotions.edit', $promotion)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        
                                        <button class="btn btn-outline-danger delete-confirm"
                                        type="button" onclick="confirmDelete('delete-item_{{$promotion->id}}')" title="Eliminar">
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
        var table = $('#promotions_table').DataTable({
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
                        window.location.href = "{{route('promotions.create')}}"
                    }
                }
            ]
        });
    });
</script>
@endsection
