<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Str;


class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence;
        return [
            'title'=> $name,
            'slug' => Str::slug($name),
            'status'=> 'PUBLIC',
            'excerpt'=> $this->faker->sentence,
            'body'=> $this->faker->sentence,

            'iframe'=> '<iframe src="https://www.youtube.com/embed/_Tps1-ac5UY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'published_at'=> Carbon::now(),
            'category_id'=> rand(1,5)
        ];
    }
}