<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Product;
use App\Tag;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WebBlogController extends Controller
{
    public function blog(){
        $breadcrumbs = [
            [
                'url'=>route('web.welcome'),
                'text'=>'Home',
            ],
            [
                'url'=>route('web.blog'),
                'text'=>'Blog',
            ]
        ];
        $posts = Post::where('status', 'PUBLIC')
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            }
        ])
        ->paginate(8);
        return view('web.blog',compact(
            'posts',
            
            'breadcrumbs'
        ));
    }
    public function blog_details(Post $post){
        $breadcrumbs = [
            [
                'url'=>route('web.welcome'),
                'text'=>'Home',
            ],
            [
                'url'=>route('web.blog'),
                'text'=>'Blog',
            ],
            [
                'url'=>'',
                'text'=>$post->title,
            ]
        ];
        return view('web.blog_details', compact(
            'post',
            'breadcrumbs'
        ));
    }
    public function get_posts_category(Category $category){
        $posts = $category->posts()->paginate(8);
        $breadcrumbs = [
            [
                'url'=>route('web.welcome'),
                'text'=>'Home',
            ],
            [
                'url'=>route('web.blog'),
                'text'=>'Blog',
            ],
            [
                'url'=>'',
                'text'=>$category->name,
            ]
        ];
        return view('web.blog',compact(
            'posts',
            'breadcrumbs'
        ));
    }
    public function get_posts_tag(Tag $tag){
        $posts = $tag->posts()->paginate(8);
        $breadcrumbs = [
            [
                'url'=>route('web.welcome'),
                'text'=>'Home',
            ],
            [
                'url'=>route('web.blog'),
                'text'=>'Blog',
            ],
            [
                'url'=>'',
                'text'=>$tag->name,
            ]
        ];
        return view('web.blog',compact(
            'posts',
            'breadcrumbs'
        ));
    }
    public function search_posts(Request $request){
        $posts = Post::where('status', 'PUBLIC')->where('title', 'LIKE', "%$request->search_words%")->paginate(8);
        $breadcrumbs = [
            [
                'url'=>route('web.welcome'),
                'text'=>'Home',
            ],
            [
                'url'=>route('web.blog'),
                'text'=>'Blog',
            ],
            [
                'url'=>'',
                'text'=>$request->search_words,
            ]
        ];
        if ($posts->count() == 1) {
            foreach ($posts as $key => $post) {
                return redirect()->route('web.blog_details',$post);
            }
        } else {
            return view('web.blog',compact(
                'posts',
                'breadcrumbs'
            ));
        }
    }
    public function get_posts_month($date){
        $oldDate = strtotime($date);
        $newDate = date('m',$oldDate);  
        $posts = Post::where('status', 'PUBLIC')->whereMonth('published_at', $newDate)->paginate(8);
        $breadcrumbs = [
            [
                'url'=>route('web.welcome'),
                'text'=>'Home',
            ],
            [
                'url'=>route('web.blog'),
                'text'=>'Blog',
            ],
            [
                'url'=>'',
                'text'=>$date,
            ]
        ];
        return view('web.blog',compact(
            'posts',
            'breadcrumbs'
        ));
    }
    public function posts_json(){
        $posts = Post::where('status', 'PUBLIC')->pluck('title');
        return $posts;
    }
}
