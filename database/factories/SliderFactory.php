<?php

namespace Database\Factories;

use App\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => '<h2>shopping bag</h2><h4>fashion collection 2018</h4><p>for less than $199.00</p>',
            'business_id'=> 1,
        ];
    }
}