@extends('layouts.admin')
@section('title','Gestión de suscripciones')
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
            Suscripciones
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Suscripciones</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Suscripciones</h4>
                    </div>

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    {{--  <th>Imágenes de perfil</th>  --}}
                                    <th>Correo electrónico</th>
                                    <th>Fecha de registro</th>
                                    <th>Estado de validación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscriptions as $subscription)
                                <tr>
                                    <th scope="row">{{$subscription->id}}</th>

                                    <td class="py-1">
                                        <img src="{{$subscription->avatar}}" class="img-sm rounded-circle">
                                        {{$subscription->email}}
                                    </td>
                                    {{--  <td>
                                       
                                    </td>  --}}

                                    <td>{{$subscription->created_at}}</td>

                                    <td>{{$subscription->validation_status()}}</td>

                                    <td>

                                        <form method="POST" action="{{route('subscriptions.destroy',$subscription)}}" id="delete-item_{{$subscription->id}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button class="btn btn-outline-danger delete-confirm"
                                        type="button" onclick="confirmDelete('delete-item_{{$subscription->id}}')" title="Eliminar">
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
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('js/my_functions.js') !!}
@endsection
