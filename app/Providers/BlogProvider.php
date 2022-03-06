<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class BlogProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view::composer(['web.blog._blog_sidebar_wrapper'], 'App\Http\ViewComposers\PostCategoryViewComposer');

        view::composer(['web.blog._blog_sidebar_wrapper'], 'App\Http\ViewComposers\RecentPostsViewComposer');

        view::composer(['web.blog._blog_sidebar_wrapper'], 'App\Http\ViewComposers\PostTagViewComposer');

        view::composer(['web.blog._blog_sidebar_wrapper'], 'App\Http\ViewComposers\PostsMonthViewComposer');

    }
}
