<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Category;

class PostCategoryViewComposer{
    public function compose(View $view){
        $post_categories = Category::where('category_type', 'POST')->get();
        $view->with (['post_categories' => $post_categories]);
    }
}

