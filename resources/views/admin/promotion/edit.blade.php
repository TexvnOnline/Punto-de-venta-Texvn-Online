@extends('layouts.admin')
@section('title','Editar promoción')
@section('styles')

{!! Html::style('bootstrap_select/dist/css/bootstrap-select.css') !!}
{!! Html::style('datetimepicker/build/jquery.datetimepicker.min.css') !!}
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Editar promoción
        </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
            <li class="breadcrumb-item"><a href="{{route('promotions.index')}}">Promoción</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar {{$promotion->name}}</li>
          </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    {!! Form::model($promotion,['route'=>['promotions.update',$promotion], 'method'=>'PUT']) !!}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="name">Nombre</label>
                              <input type="text" class="form-control" name="name" id="name" value="{{old('name', $promotion->name)}}" required>
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date">Fecha de inicio</label>
                                <input type="text" class="form-control date_time_picker" name="raw_start_date" id="start_date" value="{{old('start_date', $promotion->start_date->format('Y/m/d H:i'))}}" required>
                              </div>       
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ending_date">Fecha final</label>
                                <input type="text" class="form-control date_time_picker" name="raw_ending_date" id="ending_date" value="{{old('ending_date', $promotion->ending_date->format('Y/m/d H:i'))}}" required>
                                
                              </div>
                        </div>


                        <div class="col-md-8">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Tipo de descuento</label>
                              <div class="col-sm-4">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input radio_type" name="promotion_type" id="membershipRadios1" value="percent" 
                                    @if ($promotion->promotion_type =='percent')
                                      checked
                                    @endif
                                    >
                                    Porcentaje
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input radio_type" name="promotion_type" id="membershipRadios2" value="fixed_amount" 
                                    @if ($promotion->promotion_type =='fixed_amount')
                                      checked
                                    @endif
                                    >
                                    Monto fijo
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>

                        <div class="col-md-4" id="div_discount_rate" 
                        @if ($promotion->promotion_type != 'percent')
                        style="display: none"
                        @endif
                        >
                            <div class="form-group">
                                <label for="discount_rate">Porcentaje de descuento</label>
                                <div class="input-group">
                                <input type="text" class="form-control" name="raw_discount_percentage" id="discount_rate" 
                                maxlength="8"
                                pattern="[0-9 .]*" 
                                value="{{old('discount_rate', $promotion->discount_rate)}}" >
                                  <div class="input-group-append">
                                      <span class="input-group-text"><i class="fas fa-percent"></i></span>
                                    </div>
                                </div>
                                
                            </div>     
                        </div>
                        <div class="col-md-4" id="div_fixed_amount_discount"
                        @if ($promotion->promotion_type !='fixed_amount')
                        style="display: none"
                        @endif
                        >
                            <div class="form-group">
                                <label for="fixed_amount_discount">Monto de descuento</label>
                                
                                    <input type="number" class="form-control" name="fixed_amount_discount" id="fixed_amount_discount" value="{{old('fixed_amount_discount', $promotion->fixed_amount_discount)}}"  step="0.01">

                            </div>   
                        </div>
                        <div class="col-md-12">

                            <div class="form-group">
                              <label for="">Productos</label>
                              <select class="form-control " name="products[]" id="product_id" 
                               data-actions-box="true" 
                               data-live-search="true" 
                               data-selected-text-format="count > 4"
                               title="Seleccione los productos a los que se le aplicara la oferta" 
                               data-size="3" 
                               data-header="Seleccione los productos" 
                               multiple>
                                  @foreach ($products as $product)
                                  <option value="{{$product->id}}"
                                    
                                    {{ collect(old('product_id', $promotion->products->pluck('id')))->contains($product->id) ? 'selected' : ''}}

                                    >({{$product->code}})-{{$product->name}}</option>
                                  @endforeach
                              </select>
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

@endsection
@section('scripts')
<script>
    function discount_rate(){
        document.querySelector('#discount_rate').addEventListener('input', function(e) {
            let int = e.target.value.slice(0, e.target.value.length - 1);
            
            if (int.length >= 3 && int.length <= 4 && !int.includes('.')) {
              e.target.value = int.slice(0, 2) + '.' + int.slice(2, 3);
              e.target.setSelectionRange(4, 4);
            } else if (int.length >= 5 & int.length <= 6) {
              let whole = int.slice(0, 2);
              let fraction = int.slice(3, 5);
              e.target.value = whole + '.' + fraction;
            } else {
              e.target.value = int + ' ';
              e.target.setSelectionRange(e.target.value.length - 1, e.target.value.length - 1);
            }
            
          });
          
          function getInt(val) {
            let v = parseFloat(val);
            if (v % 1 === 0) {
              return v;
            } else {
              let n = v.toString().split('.').join('');
              return parseInt(n);
            }
          }
    }


    $(document).ready(function(){

        $(".radio_type").click(function(evento){
          
            var valor = $(this).val();
          
            if(valor == 'percent'){
               
                $("#div_discount_rate").css("display", "block");
                $("#div_fixed_amount_discount").css("display", "none");
                discount_rate();
            }else{
                $("#div_fixed_amount_discount").css("display", "block");
                $("#div_discount_rate").css("display", "none");
            }
        });
    });
</script>
@if ($promotion->promotion_type == 'percent')
<script>
  discount_rate();
</script>
@endif


{!! Html::script('bootstrap_select/dist/js/bootstrap-select.min.js') !!}
{!! Html::script('datetimepicker/build/jquery.datetimepicker.full.min.js') !!}
<script>
    $(document).ready(function () {
        jQuery('.date_time_picker').datetimepicker();
    });
</script>
<script>
    $.fn.selectpicker.Constructor.BootstrapVersion = '4';
    $.fn.selectpicker.Constructor.DEFAULTS.multipleSeparator = ' | ';

    $('#product_id').selectpicker();
</script>

@endsection
