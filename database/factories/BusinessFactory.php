<?php
namespace Database\Factories;

use App\Business;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Business::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> 'Lorem ipsum',
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras commodo et mauris non sagittis. Aliquam ac lacus a augue efficitur volutpat ac ac massa. Vestibulum vel ipsum bibendum, pellentesque metus nec.',
            'logo'=> '/image/logo.png',
            'email'=> 'mauris@fermentum.com',
            'address'=> 'Cl. Franco De La Rosa # 18100 Hab. 954',
            'ruc'=> '20538856674',
            'phone'=> '+51 958456154',
            'contact_text'=> 'vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.',
            'hours_of_operation'=> 'Lunes - Sábado: 08 AM - 22 PM',
            'latitude'=> '-12.0686357',
            'length'=> '-75.2102976',
            'google_maps_link'=> 'https://goo.gl/maps/f6qPrvtSZUhf9DzS7',
        ];
    }
}
