<?php
namespace Database\Seeders;

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'iso'=>'usd',
            'tax'=>0.18,
        ]);
    }
}
