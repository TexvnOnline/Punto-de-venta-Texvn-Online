<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Brand;

class BrandViewComposer{

    public function compose(View $view){
        $web_brands = Brand::
        with([
            'image'=> function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            }])
        ->get(['id','name', 'slug']);
        $view->with (['web_brands' => $web_brands]);
    }
}