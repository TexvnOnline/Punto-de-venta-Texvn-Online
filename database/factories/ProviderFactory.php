<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Provider;

class ProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Provider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->company,
            'email'=>$this->faker->email,
            'ruc_number'=>$this->faker->numberBetween($min = 10000000000, $max = 11111111111),
            'address'=>$this->faker->address,
            'phone'=>$this->faker->e164PhoneNumber
        ];
    }
}