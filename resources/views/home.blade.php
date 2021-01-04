@extends('layouts.admin')
@section('title','Panel administrador')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
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
            Panel administrador
        </h3>
    </div>

    @foreach ($totales as $total)
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card text-white bg-warning">

                <div class="card-body pb-0">
                    <div class="float-right">
                        <i class="fas fa-cart-arrow-down fa-4x"></i>
                    </div>
                    <div class="text-value h4"><strong>PEN {{$total->totalcompra}} (MES ACTUAL)</strong>
                    </div>
                    <div class="h3">Compras</div>
                </div>
                <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                    <a href="{{route('purchases.index')}}" class="small-box-footer h4">Compras <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>

            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card  text-white bg-info">

                <div class="card-body pb-0">

                    <div class="float-right">
                        <i class="fas fa-shopping-cart fa-4x"></i>
                    </div>
                    <div class="text-value h4"><strong>PEN {{$total->totalventa}} (MES ACTUAL) </strong>
                    </div>
                    <div class="h3">Ventas</div>
                </div>
                <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                    <a href="{{route('sales.index')}}" class="small-box-footer h4">Ventas <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>

            </div>
        </div>
    </div>
    @endforeach

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <i class="fas fa-gift"></i>
                    Ventas diarias
                </h4>
                <canvas id="ventas_diarias" height="100"></canvas>
                <div id="orders-chart-legend" class="orders-chart-legend"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-gift"></i>
                        Compras - Meses
                    </h4>
                    <canvas id="compras"></canvas>
                    <div id="orders-chart-legend" class="orders-chart-legend"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-chart-line"></i>
                        Ventas - Meses
                    </h4>
                    <canvas id="ventas"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-envelope"></i>
                        Productos más vendidos
                    </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th>Nombre</th>
                                    <th>Código</th>
                                    <th>Stock</th>
                                    <th>Cantidad vendida</th>
                                    <th>Ver detalles</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productosvendidos as $productosvendido)
                                <tr>
                                    <td>{{$productosvendido->id}}</td>
                                    <td>{{$productosvendido->name}}</td>
                                    <td>{{$productosvendido->code}}</td>
                                    <td><strong>{{$productosvendido->stock}}</strong> Unidades</td>
                                    <td><strong>{{$productosvendido->quantity}}</strong> Unidades</td>
                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{route('products.show', $productosvendido->id)}}">
                                            <i class="far fa-eye"></i>
                                            Ver detalles
                                        </a>
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
{!! Html::script('melody/js/chart.js') !!}
<script>
    $(function () {
        var varCompra=document.getElementById('compras').getContext('2d');
    
            var charCompra = new Chart(varCompra, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($comprasmes as $reg)
                        { 
                    
                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                    $mes_traducido=strftime('%B',strtotime($reg->mes));
            
                    echo '"'. $mes_traducido.'",';} ?>],
                    datasets: [{
                        label: 'Compras',
                        data: [<?php foreach ($comprasmes as $reg)
                            {echo ''. $reg->totalmes.',';} ?>],
                    
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth:3
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
            var varVenta=document.getElementById('ventas').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($ventasmes as $reg)
                {
                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                    $mes_traducido=strftime('%B',strtotime($reg->mes));
                    
                    echo '"'. $mes_traducido.'",';} ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasmes as $reg)
                        {echo ''. $reg->totalmes.',';} ?>],
                        backgroundColor: 'rgba(20, 204, 20, 1)',
                        borderColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
            var varVenta=document.getElementById('ventas_diarias').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($ventasdia as $ventadia)
                {
                    $dia = $ventadia->dia;
                    
                    echo '"'. $dia.'",';} ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasdia as $reg)
                        {echo ''. $reg->totaldia.',';} ?>],
                        backgroundColor: 'rgba(20, 204, 20, 1)',
                        borderColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
    });
</script>

@endsection
