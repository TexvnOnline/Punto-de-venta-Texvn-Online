<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Post;


class RecentPostsViewComposer{
    public function compose(View $view){
        $recent_posts = Post::latest('published_at')->where('status', 'PUBLIC')
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            }
        ])
        ->take(3)->get(['title', 'slug', 'excerpt', 'iframe']);

        $view->with (['recent_posts' => $recent_posts]);
    }
}

