<?php
namespace Database\Seeders;

use App\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            'usd',
            'eur',
            'gbp',
            'jpy',
        ];
        foreach ($currencies as $key => $currency) {
            Currency::create([
                'iso' => $currency,
            ]);
        }
    }
}
