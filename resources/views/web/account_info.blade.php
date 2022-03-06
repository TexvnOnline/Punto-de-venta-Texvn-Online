@extends('web.my_account')
@section('content_tab')
<div class="col-lg-9 col-md-8">
    {{--  <div class="tab-content" id="myaccountContent">  --}}
     
        {{--  <div class="tab-pane fade" id="orders" role="tabpanel">  --}}
        
            <!-- Single Tab Content Start -->
            {{--  <div class="tab-pane fade" id="address-edit" role="tabpanel">
                <div class="myaccount-content">
                    <h3>Billing Address</h3>
                    <address>
                        <p><strong>Alex Tuntuni</strong></p>
                        <p>1355 Market St, Suite 900 <br>
                            San Francisco, CA 94103</p>
                        <p>Mobile: (123) 456-7890</p>
                    </address>
                    <a href="#" class="check-btn sqr-btn "><i class="fa fa-edit"></i> Edit
                        Address</a>
                </div>
            </div>  --}}
            <!-- Single Tab Content End -->

            <!-- Single Tab Content Start -->
            <div class="myaccount-content">
                <h3>Account Details</h3>
                <div class="account-details-form">
                    
                    {!! Form::model($user,['route'=>['web.update_client',$user], 'method'=>'PUT']) !!}

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="name" class="required">Nombre</label>
                                    <input type="text" id="name" name="name" 
                                    value="{{old('ruc',$user->name)}}"
                                        placeholder="Nombre" required/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="surnames" class="required">Apellido</label>
                                    <input type="text" id="surnames" name="surnames" 
                                    value="{{old('ruc',$user->surnames)}}" 
                                    placeholder="Apellido" required/>
                                </div>
                            </div>
                        </div>
                        {{--  <div class="single-input-item">
                            <label for="display-name" class="required">Display Name</label>
                            <input type="text" id="display-name" placeholder="Display Name" />
                        </div>  --}}
                        <div class="single-input-item">
                            <label for="email" class="required">Dirección de correo electronico</label>
                            <input type="email" id="email" name="email" 
                            value="{{old('ruc',$user->email)}}"
                            placeholder="Dirección de correo electrónico" required/>
                        
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="dni" class="required">Número de DNI</label>
                                    <input type="number" id="dni" name="dni" 
                                    value="{{old('ruc',$user->profile->dni)}}"
                                        placeholder="Número de DNI" required/>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="ruc" class="required">Número de RUC</label>
                                    <input type="number" id="ruc" name="ruc" value="{{old('ruc',$user->profile->ruc)}}"
                                        placeholder="Número de RUC" />
                                </div>
                            </div>
                        </div>

                        <div class="single-input-item">
                            <button class="check-btn sqr-btn ">Guardar cambios</button>
                        </div>
                    
                    {!! Form::close() !!}
                    
                </div>
            </div>

        {{--  </div>  --}}
       
    {{--  </div>  --}}
</div>
@endsection
