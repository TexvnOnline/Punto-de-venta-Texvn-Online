<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Post;
use Illuminate\Support\Facades\DB;

class PostsMonthViewComposer{
    public function compose(View $view){
        $months = Post::where('status', 'PUBLIC')->select(
            DB::raw("count(*) as count"),
            DB::raw("DATE_FORMAT(published_at,'%M %Y') as date")
        )->groupBy('date')
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            }
        ])
        ->get(['title', 'slug', 'excerpt', 'iframe']);
        $view->with (['months' => $months]);
    }
}

