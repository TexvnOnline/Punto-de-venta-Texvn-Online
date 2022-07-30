<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;

<<<<<<< HEAD

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
=======
$factory->define(Product::class, function (Faker $faker) {
    return [
        'code'=>$faker->ean8,
        'name'=>$faker->streetName,
        'stock'=>$faker->buildingNumber,
        'image'=>$faker->imageUrl($width = 270, $height = 270),
        'sell_price'=>$faker->randomNumber(2),
        'status'=>'ACTIVE',
        'category_id'=>rand(1,20),
        'provider_id'=>rand(1,30),
    ];
});
>>>>>>> b53b1fea2efec8f2d84b498e16d1483e9991dbf9
