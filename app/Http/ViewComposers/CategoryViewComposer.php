<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Category;

class CategoryViewComposer{

    public function compose(View $view){
        $web_categories = Category::
        where('category_type', 'PRODUCT')
        ->with('subcategories')
        ->get(['id','name', 'slug', 'icon']);
        $view->with (['web_categories' => $web_categories]);
    }

}