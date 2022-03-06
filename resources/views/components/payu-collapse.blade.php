<div class="payment-method-details" data-method="{{$paymentPlatform->id}}">
    <label class="mt-3">Detalles de la tarjeta:</label>

    <div class="form-group form-row mb-3 mt-3">
        <div class="col-6 single-input-item">
            <input  name="payu_card" type="text" placeholder="Número de tarjeta">
        </div>

        <div class="col-2 single-input-item">
            <input  name="payu_cvc" type="text" placeholder="CVC">
        </div>

        <div class="col-2 single-input-item">
            <input  name="payu_month" type="text" placeholder="MM">
        </div>

        <div class="col-2 single-input-item">
            <input  name="payu_year" type="text" placeholder="YY">
        </div>

        
    </div>



    <div class="form-group form-row mb-3">
        <div class="col-4 single-input-item">
            <select class="nice-select" name="payu_network">
                <option selected disabled>Seleccione</option>
                <option value="visa">VISA</option>
                <option value="amex">AMEX</option>
                <option value="diners">DINERS</option>
                <option value="mastercard">MASTERCARD</option>
            </select>
        </div>

        <div class="col-4 single-input-item">
            <input  name="payu_name" id="payu_name" type="text" placeholder="Tu nombre" required>
        </div>
        <div class="col-4 single-input-item">
            <input  name="payu_email" id="payu_email" type="text" placeholder="Correo electrónico" required>
        </div>
    </div>

  


    <div class="form-group form-row">
        <div class="col">
            <small class="form-text text-mute"  role="alert" >Su pago se convertirá a {{ strtoupper(config('services.payu.base_currency')) }}</small>
        </div>
    </div>

</div>
