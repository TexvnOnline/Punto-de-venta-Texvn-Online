<?php

namespace Database\Factories;

use App\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CurrencyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Currency::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'iso' => $this->faker->randomElement([
                'usd',
                'eur',
                'gbp',
                'jpy'
            ])
        ];
    }
}
