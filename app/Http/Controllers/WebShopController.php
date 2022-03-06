<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use App\Product;
use App\Tag;
use App\Category;
use App\Post;
use App\Business;
use App\Slider;
use App\SocialMedia;
use App\PaymentPlatform;

use App\ShoppingCart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\DB;

class WebShopController extends Controller
{
    public function welcome(){
        $sliders = Slider::
        with([
            'image'=> function($query) {
                $query->select('id', 'url', 'imageable_id'); 
        }])
        ->get(['id','body']);
        $featured_products = Product::store_products()
        ->withCount(['ratings as average_rating' => function($query) {
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        }])->orderByDesc('average_rating')
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            },
            'promotions',
            'ratings'
        ])
        ->take(8)->get(['id','name', 'stock', 'sell_price']);
        $new_products = Product::store_products()->latest()
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            },
            'promotions',
            'ratings'
        ])
        ->take(6)->get(['id','name','slug', 'stock', 'sell_price']);
        $sale_products = Product::store_products()->withCount(['order_details as order_count' => function($query) {
            $query->select(DB::raw('sum((quantity))'));
        }])->orderByDesc('order_count')
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            },
            'promotions',
            'ratings'
        ])
        ->take(6)->get(['id','name', 'stock', 'sell_price']);

        $latest_posts = Post::where('status', 'PUBLIC')->latest()
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            }
        ])
        ->take(3)->get(['title', 'slug', 'excerpt', 'iframe']);
        $most_viewed_products = Product::store_products()
        ->orderBy('views', 'DESC')
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            },
            'promotions',
            'ratings'
        ])
        ->take(6)->get(['id','name','slug', 'stock', 'sell_price']);
        $products_offer = Product::store_products()->has('promotions')
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            },
            'promotions',
            'ratings'
        ])
        ->take(6)->get(['id','name','slug', 'stock', 'sell_price']);
        
        return view('welcome', compact(
            'featured_products',
            'new_products',
            'sale_products',
            'latest_posts',
            'most_viewed_products',
            'products_offer',
            'sliders',
        ));
    }

    public function shop_grid(){
        $products = Product::store_products()
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            },
            'promotions',
            'ratings'
        ])
        ->paginate(12);

        $featured_products = Product::store_products()->withCount(['ratings as average_rating' => function($query) {
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        }])
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            },
            'promotions',
            'ratings'
        ])
        ->orderByDesc('average_rating')->take(8)->get();
        $breadcrumbs = [
            [
                'url'=>route('web.welcome'),
                'text'=>'Home',
            ],
            [
                'url'=>'',
                'text'=>'Tienda',
            ]
        ];
        return view('web.shop_grid', compact('products','featured_products','breadcrumbs'));
    }
    public function get_products_tag(Tag $tag){
        $products = $tag->products()
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            },
            'promotions',
            'ratings'
        ])
        ->paginate(12);

        $featured_products = Product::store_products()->withCount(['ratings as average_rating' => function($query) {
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        }])
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            },
            'promotions',
            'ratings'
        ])
        ->orderByDesc('average_rating')->take(8)->get();
        $breadcrumbs = [
            [
                'url'=>route('web.welcome'),
                'text'=>'Home',
            ],
            [
                'url'=>route('web.shop_grid'),
                'text'=>'Tienda',
            ],
            [
                'url'=>'',
                'text'=>$tag->name,
            ]
        ];
        return view('web.shop_grid', compact('products','featured_products','breadcrumbs'));
    }
    public function get_products_category(Category $category){
        $products = Product::store_products()->whereHas('category', function ($query) use ($category) {
            $query->whereIn('categories.id', $category->descendantsAndSelf()->select('id')->getQuery());
        })
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            },
            'promotions',
            'ratings'
        ])
        ->paginate(12);
        $featured_products = Product::store_products()->withCount(['ratings as average_rating' => function($query) {
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        }])
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            },
            'promotions',
            'ratings'
        ])
        ->orderByDesc('average_rating')->take(8)->get();
        $breadcrumbs = [
            [
                'url'=>route('web.welcome'),
                'text'=>'Home',
            ],
            [
                'url'=>route('web.shop_grid'),
                'text'=>'Tienda',
            ],
            [
                'url'=>'',
                'text'=>$category->name,
            ]
        ];
        return view('web.shop_grid', compact('products','featured_products','breadcrumbs'));
    }

    public function get_products_brand(Brand $brand){
        $products = $brand->products()
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            },
            'promotions',
            'ratings'
        ])
        ->paginate(12);

        $featured_products = Product::store_products()->withCount(['ratings as average_rating' => function($query) {
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        }])
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            },
            'promotions',
            'ratings'
        ])
        ->orderByDesc('average_rating')->take(8)->get();
        $breadcrumbs = [
            [
                'url'=>route('web.welcome'),
                'text'=>'Home',
            ],
            [
                'url'=>route('web.shop_grid'),
                'text'=>'Tienda',
            ],
            [
                'url'=>'',
                'text'=>$brand->name,
            ]
        ];
        return view('web.shop_grid', compact('products','featured_products','breadcrumbs'));
    }

    public function products_json(){
        $products = Product::store_products()->pluck('name');
        return $products;
    }
    public function product_details(Product $product){
        $product->views++;
        $product->save();

        $featured_products = Product::store_products()->withCount(['ratings as average_rating' => function($query) {
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        }])
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            },
            'promotions',
            'ratings'
        ])
        ->orderByDesc('average_rating')->take(8)->get();

        $breadcrumbs = [
            [
                'url'=>route('web.welcome'),
                'text'=>'Home',
            ],
            [
                'url'=>route('web.shop_grid'),
                'text'=>'Tienda',
            ],
            [
                'url'=>'',
                'text'=>$product->name,
            ]
        ];

        return view('web.product_details', compact('product','featured_products','breadcrumbs'));
    }
    
    public function search_products(Request $request){
        $products = Product::store_products()->where('name', 'LIKE', "%$request->search_words%")->paginate(12);
        $featured_products = Product::store_products()->withCount(['ratings as average_rating' => function($query) {
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        }])
        ->with([
            'images' => function($query) {
                $query->select('id', 'url', 'imageable_id'); 
            },
            'promotions',
            'ratings'
        ])
        ->orderByDesc('average_rating')->take(8)->get();

        $breadcrumbs = [
            [
                'url'=>route('web.welcome'),
                'text'=>'Home',
            ],
            [
                'url'=>route('web.shop_grid'),
                'text'=>'Tienda',
            ],
            [
                'url'=>'',
                'text'=>$request->search_words,
            ]
        ];

        return view('web.shop_grid', compact('products','featured_products','breadcrumbs'));
    }
}
