<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Tag;

class PostTagViewComposer{
    public function compose(View $view){
        $post_tags = Tag::whereHas('taggables', function($query){
            $query->where('taggable_type','App\Post');
        })->get([
            'name',
            'slug'
        ]);
        $view->with (['post_tags' => $post_tags]);
    }
}

