@extends('web.my_account')
@section('content_tab')
<div class="col-lg-9 col-md-8">
    {{--  <div class="tab-content" id="myaccountContent">  --}}
     
        {{--  <div class="tab-pane fade" id="orders" role="tabpanel">  --}}
            <div class="myaccount-content">
                <h3>Orders</h3>
                <div class="myaccount-table table-responsive text-center">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Pedido</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Total</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders  as $key => $order)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->shipping_status}}</td>
                                <td>{{$order->total()}}</td>
                                <td>
                                    <a href="{{route('web.order_details', $order)}}" class="check-btn sqr-btn ">Ver</a>
                                </td>
                            </tr>   
                            @empty
                                <tr>
                                    <td colspan="5">No hay pedidos.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        {{--  </div>  --}}
       
    {{--  </div>  --}}
</div>
@endsection
