<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Promotion;
use Carbon\Carbon;

class PromotionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Promotion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'discount_rate'=> $this->faker->numberBetween($min = 0.01, $max = 1),
            'start_date'=> Carbon::now(),
            'ending_date'=> Carbon::today()->addDays(rand(1, 30)),
        ];
    }
}