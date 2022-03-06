<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\SocialMedia;

class SocialMediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SocialMedia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        
            'url'=> 'https://www.youtube.com/channel/UCMWSlUcDJS00-5pmicciZ_w',
            'name'=> $this->faker->randomElement([
                'Facebook',
                'Twitter',
                'Instagram',
                'Google plus',
                'Youtube'
            ]),
            'icon'=>$this->faker->randomElement([
               'fa-facebook',
               'fa-twitter',
               'fa-instagram',
               'fa-google-plus',
               'fa-youtube'
            ]),
            'business_id'=> 1
        ];
    }
}