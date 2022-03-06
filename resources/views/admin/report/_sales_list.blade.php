<tr>
    <th scope="row">
        <a href="{{route('sales.show', $sale)}}">{{$sale->id}}</a>
    </th>
    <td>
        {{\Carbon\Carbon::parse($sale->sale_date)->format('d M y h:i a')}}
    </td>
    <td>{{$sale->total}}</td>
    <td>{{$sale->status}}</td>
    <td style="width: 20%;">
        <a href="{{route('sales.pdf', $sale)}}" class="btn btn-outline-danger"
        title="Generar PDF"><i class="far fa-file-pdf"></i></a>
        <a href="{{route('sales.print', $sale)}}" class="btn btn-outline-warning"
        title="Imprimir boleta"><i class="fas fa-print"></i></a>
        <a href="{{route('sales.show', $sale)}}" class="btn btn-outline-info"
        title="Ver detalles"><i class="far fa-eye"></i></a>
    </td>
</tr>