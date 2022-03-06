<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;


class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->word();
        return [
            'code'=>$this->faker->ean8,
            'name'=>$name,
            'slug'=>Str::slug($name),
            'stock'=> 150,
            'short_description'=>$this->faker->realText($maxNbChars = 360, $indexSize = 2),
            'long_description'=>$this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'sell_price'=>$this->faker->randomNumber(2),
            'status'=>'BOTH',
            'category_id'=>rand(1,30),
            'brand_id' =>rand(1,8),
            'provider_id'=>rand(1,10),
        ];
    }
}