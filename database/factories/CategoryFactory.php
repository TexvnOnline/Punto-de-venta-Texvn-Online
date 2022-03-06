<?php

namespace Database\Factories;

use App\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->word();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'category_type'=>'PRODUCT',
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'parent_id' => null,
            'icon' => $this->faker->randomElement([
                'fa-camera',
                'fa-book',
                'fa-clock-o',
                'fa-television',
                'fa-tablet',
                'fa-book',
                'fa-microchip',
                'fa-bullhorn',
            ])
        ];
    }

    public function withParent()
    {
        return $this->state(function (array $attributes) {
            return [
                'icon'=>null,
                'category_type'=> null,
                'parent_id' => Category::inRandomOrder()->take(1)->first()->id,
            ];
        });
    }
    public function withParentSubcategory()
    {
        return $this->state(function (array $attributes) {
            return [
                'icon'=>null,
                'category_type'=> null,
                'parent_id' => Category::inRandomOrder()->take(1)->first()->id,
            ];
        });
    }
}