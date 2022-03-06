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
    {{--  <div class="page-header">
        <h3 class="page-title">
            Panel administrador
        </h3>
    </div>  --}}

    @foreach ($totales as $total)
     
     
    

    <div class="row">
        <div class="col-md-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-0">Vetas</h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-inline-block pt-3">
                            <div class="d-md-flex">
                                <h2 class="mb-0">${{$total->totalcompra}}</h2>
                                <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                    <i class="far fa-clock text-muted"></i>
                                    <small class=" ml-1 mb-0">Mes actual</small>
                                </div>
                            </div>
                            <small class="text-gray">Compras del sistema POS.</small>
                        </div>
                        <div class="d-inline-block">
                            <i class="fas fa-chart-pie text-info icon-lg"></i>                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-0">Compras</h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-inline-block pt-3">
                            <div class="d-md-flex">
                                <h2 class="mb-0">${{$total->totalventa}}</h2>
                                <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                    <i class="far fa-clock text-muted"></i>
                                    <small class="ml-1 mb-0">Mes actual</small>
                                </div>
                            </div>
                            <small class="text-gray">Ventas del sistema POS.</small>
                        </div>
                        <div class="d-inline-block">
                            <i class="fas fa-shopping-cart text-danger icon-lg"></i>                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="row">
      <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body d-flex flex-column">
              <h4 class="card-title">
                <i class="fas fa-chart-pie"></i>
                Estado de pedidos
              </h4>
              <div class="flex-grow-1 d-flex flex-column justify-content-between">
                <canvas id="sales-status-chart" class="mt-3"></canvas>
                <div class="pt-4">
                  <div id="sales-status-chart-legend" class="sales-status-chart-legend"></div>
                </div>
              </div>
            </div>
          </div>
      </div>

      <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">
                      <i class="fas fa-chart-bar"></i>

                      Productos más pedidos
                  </h4>
                  <canvas id="productos_pedidos"></canvas>
              </div>
          </div>
      </div>

  </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-chart-line"></i>
                        Ventas diarias
                    </h4>
                    <canvas id="ventas_diarias" height="100"></canvas>
                    <div id="orders-chart-legend" class="orders-chart-legend"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-chart-area"></i>
                        Compras - Meses
                    </h4>
                    <canvas id="compras"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-chart-area"></i>
                        Ventas - Meses
                    </h4>
                    <canvas id="ventas"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">
                <i class="fas fa-table"></i>
                Pedidos del día
              </h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Cliente</th>
                      <th>Fecha</th>
                      <th>Monto</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($orders_of_the_day as $order_of_the_day)
                      <tr>
                        <td class="font-weight-bold">
                          {{$order_of_the_day->user->name}}
                        </td>
                        <td class="text-muted">
                            {{$order_of_the_day->order_date->diffForHumans()}}
                        </td>
                        <td>
                            {{$order_of_the_day->total()}}
                        </td>
                        <td>
                          <label class="badge badge-{{$order_of_the_day->status()['color']}} badge-pill">{{$order_of_the_day->status()['text']}}</label>
                        </td>
                      </tr>
                      @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body d-flex flex-column">
                <h4 class="card-title">
                  <i class="fas fa-tachometer-alt"></i>
                  Estado de pedios
                </h4>
                <p class="card-description">Estado de pedidos del día</p>
                <div class="flex-grow-1 d-flex flex-column justify-content-between">
                  <canvas id="daily-sales-chart" class="mt-3 mb-3 mb-md-0"></canvas>
                  <div id="daily-sales-chart-legend" class="daily-sales-chart-legend pt-4 border-top"></div>
                </div>
              </div>
            </div>
        </div>

      </div>


    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-table"></i>
                        Productos más vendidos (POS)
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

    

    if ($("#daily-sales-chart").length) {
        var dailySalesChartData = {
          datasets: [{
            data: [<?php foreach ($orders_of_the_day_status as $order_of_the_day_status)
                  {echo ''. $order_of_the_day_status->count.',';} ?>],
            backgroundColor: [
              '#392c70',
              '#04b76b',
              '#e9e8ef',
              '#ff5e6d'
            ],
            borderWidth: 0
          }],
      
          // These labels appear in the legend and in the tooltips when hovering different arcs
          labels: [
            'Pendiente',
            'Aprobado',
            'Cancelado',
            'Entregado'
          ]
        };
        var dailySalesChartOptions = {
          responsive: true,
          maintainAspectRatio: true,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          legend: {
            display: false
          },
          legendCallback: function(chart) { 
            var text = [];
            text.push('<ul class="legend'+ chart.id +'">');
            for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
              text.push('<li><span class="legend-label" style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '"></span>');
              if (chart.data.labels[i]) {
                text.push(chart.data.labels[i]);
              }
              text.push('</li>');
            }
            text.push('</ul>');
            return text.join("");
          },
          cutoutPercentage: 70     
        };
        var dailySalesChartCanvas = $("#daily-sales-chart").get(0).getContext("2d");
        var dailySalesChart = new Chart(dailySalesChartCanvas, {
          type: 'doughnut',
          data: dailySalesChartData,
          options: dailySalesChartOptions
        });
        document.getElementById('daily-sales-chart-legend').innerHTML = dailySalesChart.generateLegend();
      }
</script>


<script>
    $(function(){
        if ($("#sales-status-chart").length) {
            var pieChartCanvas = $("#sales-status-chart").get(0).getContext("2d");
            var pieChart = new Chart(pieChartCanvas, {
              type: 'pie',
              data: {
                datasets: [{
                  data: [<?php foreach ($order_mes as $order)
                  {echo ''. $order->count.',';} ?>],
                  backgroundColor: [
                    '#392c70',
                    '#04b76b',
                    '#ff5e6d',
                    '#eeeeee'
                  ],
                  borderColor: [
                    '#392c70',
                    '#04b76b',
                    '#ff5e6d',
                    '#eeeeee'
                  ],
                }],
                labels: [
                    'Pendiente',
                    'Aprobado',
                    'Cancelado',
                    'Entregado',
                ]
              },
              options: {
                responsive: true,
                animation: {
                  animateScale: true,
                  animateRotate: true
                },
                legend: {
                  display: false
                },
                legendCallback: function(chart) { 
                  var text = [];
                  text.push('<ul class="legend'+ chart.id +'">');
                  for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                    text.push('<li><span class="legend-label" style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '"></span>');
                    if (chart.data.labels[i]) {
                      text.push(chart.data.labels[i]);
                    }
                    text.push('<label class="badge badge-light badge-pill legend-percentage ml-auto">'+ chart.data.datasets[0].data[i] + ' Pedidos</label>');
                    text.push('</li>');
                  }
                  text.push('</ul>');
                  return text.join("");
                }
              }
            });
            document.getElementById('sales-status-chart-legend').innerHTML = pieChart.generateLegend();
          }
    });
</script>

<script>
    $(function(){
        var productos_pedidos = document.getElementById('productos_pedidos').getContext('2d');
        var charCompra = new Chart(productos_pedidos, {
            type: 'bar',
            data: {
                labels: [<?php foreach ($most_ordered_products as $most_ordered_product)
                    { 
                        echo '"'. $most_ordered_product->product->name.'",';
                    } ?>],

                datasets: [{
                    label: 'Compras',
                    data:   [<?php 
                                foreach ($most_ordered_products as $most_ordered_product)
                                    {echo ''. $most_ordered_product->total.',';}
                            ?>],
                            backgroundColor: [
                                '#5E50F9',
                                '#6610f2',
                                '#6a008a',
                                '#E91E63',
                                '#f96868',
                                '#f2a654',
                                '#f6e84e',
                                '#46c35f',
                                '#58d8a3',
                                '#57c7d4',
                                '#E91E63',
                                '#f96868'
                              ],
                              borderColor: [
                                '#5E50F9',
                                '#6610f2',
                                '#6a008a',
                                '#E91E63',
                                '#f96868',
                                '#f2a654',
                                '#f6e84e',
                                '#46c35f',
                                '#58d8a3',
                                '#57c7d4',
                                '#E91E63',
                                '#f96868'
                              ],
                    borderWidth:1
                }]
            },
            
            options: {
                scales: {
                  yAxes: [{
                    ticks: {
                    
                        beginAtZero:true
                    }
                  }]
                },
                legend: {
                  display: false
                },
                elements: {
                  point: {
                    radius: 5
                  }
                }
            }
        });
    });
    
</script>


<script>
    $(function(){
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

                        backgroundColor: '#E91E63',
                        borderColor: '#E91E63',

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
                    },
                    legend: {
                      display: false
                    },
                    elements: {
                      point: {
                        radius: 5
                      }
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
                        backgroundColor: '#f96868',
                        borderColor: '#f96868',
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
                    },
                    legend: {
                      display: false
                    },
                    elements: {
                      point: {
                        radius: 5
                      }
                    }
                }
            });
            
            var varVenta=document.getElementById('ventas_diarias').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($ventasdia as $ventadia)
                {
                    $dia = $ventadia->date;


                    echo '"'. $dia.'",';} ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasdia as $reg)
                        {echo ''. $reg->count.',';} ?>],
                        backgroundColor: '#5E50F9',
                        borderColor: '#3a3f51',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                      yAxes: [{
                        ticks: {
                            stepSize: 1,
                            beginAtZero:true
                        }
                      }]
                    },
                    legend: {
                      display: false
                    },
                    elements: {
                      point: {
                        radius: 5
                      }
                    }
                }
            });
    });
</script>

@endsection
