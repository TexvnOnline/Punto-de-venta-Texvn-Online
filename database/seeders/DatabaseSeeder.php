<?php
namespace Database\Seeders;

use App\Brand;
use App\Category;
use App\Image;
use App\Post;
use App\Product;
use App\Promotion;
use App\Provider;
use App\Slider;
use App\SocialMedia;
use App\Tag;
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
        $this->call([
            PermissionsTableSeeder::class,
            SettingSeeder::class,
            PaymentPlatformSeeder::class,
            CurrencySeeder::class,
            BusinessTableSeeder::class,
            PrinterTableSeeder::class
        ]);
        
        SocialMedia::factory(5)->create();
        Tag::factory(50)->create();
        Provider::factory(10)->create();
        Promotion::factory(20)->create();

        Category::factory(9)->create();
        Category::factory()->times(20)->withParent()->create();
        Category::factory()->times(50)->withParentSubcategory()->create();

        Slider::factory(3)->create()->each(function ($slider){
            $slider->image()->save(
                Image::factory()->make()
            );
        });
        Brand::factory(8)->create()->each(function ($brand){
            $brand->image()->save(
                Image::factory()->make()
            );
        });
        Product::factory(30)->create()->each(function ($product){
            $product->tags()->attach($this->array(rand(1, 10)));
            $product->promotions()->attach($this->array(rand(1, 20)));
            $product->images()->saveMany(Image::factory(4)->make());
        });
        Post::factory(60)->create()->each(function ($post){
            $post->tags()->attach($this->array(rand(1, 10)));
        });
    }
    public function array($max)
    {
        $values = [];
        for ($i=1; $i < $max; $i++) { 
            $values[] = $i;
        }
        return $values;
    }
}
