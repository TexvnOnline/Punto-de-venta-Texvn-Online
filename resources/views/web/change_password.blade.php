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
                <h3>Cambio de contraseña</h3>
                <div class="account-details-form">
                    
                    {!! Form::model($user,['route'=>['web.update_password',$user], 'method'=>'PUT']) !!}
                    

                        <div class="single-input-item">
                            <label for="old_password" class="required">Contraseña actual</label>
                            <input type="password" id="old_password" name="old_password"
                                placeholder="Contraseña actual" required/>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="password" class="required">Nueva contraseña</label>
                                    <input type="password" id="password" name="password"
                                        placeholder="Nueva contraseña" required/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="password-confirm" class="required">confirmar Contraseña</label>
                                    <input type="password" id="password-confirm" name="password_confirmation"
                                        placeholder="confirmar Contraseña" />
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
