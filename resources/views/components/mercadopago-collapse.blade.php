


<div class="payment-method-details" data-method="{{$paymentPlatform->id}}">
    <label class="mt-3">Detalles de la tarjeta:</label>

    <div class="form-group form-row mb-3 mt-3">
        <div class="col-5 single-input-item">
            <input  type="text" id="cardNumber" data-checkout="cardNumber" placeholder="Número de tarjeta">
        </div>

        <div class="col-3 single-input-item">
            <input  type="text" data-checkout="securityCode" placeholder="CVC">
        </div>
        <div class="col-2 single-input-item">
            <input  type="text" data-checkout="cardExpirationMonth" placeholder="MM">
        </div>

        <div class="col-2 single-input-item">
            <input  type="text" data-checkout="cardExpirationYear" placeholder="YY">
        </div>
    </div>



    <div class="form-group form-row mb-3">
        <div class="col-6 single-input-item">
            <input  type="text" data-checkout="cardholderName" placeholder="Tu nombre">
        </div>
        <div class="col-6 single-input-item">
            <input  type="email" data-checkout="cardholderEmail" placeholder="Correo electrónico" name="email">
        </div>
    </div>


    <div class="form-group form-row mb-3">
        <div class="col-4 single-input-item">
            <select class="nice-select" id="docType" name="docType" data-checkout="docType" type="text">

            </select>
        </div>
        <div class="col-8 single-input-item">
             <input id="docNumber" name="docNumber" data-checkout="docNumber" type="text" placeholder="Número de Documento"/>
        </div>
    </div>
  
    <div class="form-group form-row">
        <div class="col">
            <small class="form-text text-mute"  role="alert" >Su pago se convertirá a {{ strtoupper(config('services.mercadopago.base_currency')) }}</small>
        </div>
    </div>

    <div class="form-group form-row">
        <div class="col">
            <small class="form-text text-danger" id="paymentErrors" role="alert"></small>
        </div>
    </div>

    <input type="hidden" id="cardToken" name="card_token">
    <input type="hidden" id="cardNetwork" name="card_network">
</div>



@push('scripts')

{!! Html::script('https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js') !!}
<script>
    const mercadoPago = window.Mercadopago;
    mercadoPago.setPublishableKey('{{ config('services.mercadopago.key') }}');
    mercadoPago.getIdentificationTypes();
</script>

<script>
    function setCardNetwork()
    {
        const cardNumber = document.getElementById("cardNumber");

        mercadoPago.getPaymentMethod(
            { "bin": cardNumber.value.substring(0,7) },
            function(status, response) {
                const cardNetwork = document.getElementById("cardNetwork");
                
                cardNetwork.value = response[0].id;
                mercadoPagoForm.submit();
            }
        );
    }
</script>

<script>
    const mercadoPagoForm = document.getElementById("paymentForm");

    mercadoPagoForm.addEventListener('submit', function(e) {
        if (mercadoPagoForm.elements.paymentmethod.value === "{{ $paymentPlatform->id }}") {
            e.preventDefault();

            mercadoPago.createToken(mercadoPagoForm, function(status, response) {
                if (status != 200 && status != 201) {
                    const errors = document.getElementById("paymentErrors");

                    errors.textContent = response.cause[0].description;
                } else {
                    const cardToken = document.getElementById("cardToken");
                    cardToken.value = response.id;
                    setCardNetwork();
                }
            });
        }
    });
</script>

@endpush
