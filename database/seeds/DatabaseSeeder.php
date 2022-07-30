<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->call(BusinessTableSeeder::class);
        $this->call(PrinterTableSeeder::class);

        factory(App\Category::class, 20)->create();
        factory(App\Provider::class, 30)->create();
        factory(App\Product::class, 200)->create();
        factory(App\Client::class, 150)->create();
    }
}
