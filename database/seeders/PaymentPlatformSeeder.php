<?php
namespace Database\Seeders;

use App\PaymentPlatform;
use Illuminate\Database\Seeder;

class PaymentPlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentPlatform::create([
            'name'=>'PayPal',
            'image'=>'img/payment-platforms/paypal.png',
        ]);
        PaymentPlatform::create([
            'name' => 'Stripe',
            'image' => 'img/payment-platforms/stripe.png',
        ]);

        PaymentPlatform::create([
            'name' => 'MercadoPago',
            'image' => 'img/payment-platforms/mercadopago.png',
        ]);

        PaymentPlatform::create([
            'name' => 'PayU',
            'image' => 'img/payment-platforms/payu.png',
        ]);
    }
}
