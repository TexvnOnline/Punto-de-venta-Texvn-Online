@extends('web.my_account')
@section('content_tab')
<div class="col-lg-9 col-md-8">
    {{--  <div class="tab-content" id="myaccountContent">  --}}
     
        {{--  <div class="tab-pane fade" id="orders" role="tabpanel">  --}}
            <div class="myaccount-content">
                <h3>Detalles de pedido</h3>
                <div class="myaccount-table table-responsive text-center">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio Venta (PEN)</th>
                                <th>Cantidad</th>
                                <th>SubTotal(PEN)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($details as $detail)
                            <tr>
                                <td>{{$detail->product->name}}</td>
                                <td>s/{{$detail->price}}</td>
                                <td>{{$detail->quantity}}</td>
                                <td>s/{{number_format($detail->total(),2)}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">
                                    <p align="right">SUBTOTAL:</p>
                                </th>
                                <th>
                                    <p align="right">s/{{number_format($order->subtotal(),2)}}</p>
                                </th>
                            </tr>

                            <tr>
                                <th colspan="3">
                                    <p align="right">TOTAL IMPUESTO ({{$order->tax}}%):</p>
                                </th>
                                <th>
                                    <p align="right">s/{{number_format($order->total_tax(),2)}}</p>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3">
                                    <p align="right">TOTAL:</p>
                                </th>
                                <th>
                                    <p align="right">s/{{number_format($order->total(),2)}}</p>
                                </th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        {{--  </div>  --}}
       
    {{--  </div>  --}}
</div>
@endsection
