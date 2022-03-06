<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Tag;

class TagViewComposer{

    public function compose(View $view){
        $web_tags_products = Tag::
        whereHas('taggables', function($query){
            $query->where('taggable_type','App\Product');
        })
        ->get(['name', 'slug',]);
        $view->with (['web_tags_products' => $web_tags_products]);
    }

}


