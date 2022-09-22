<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Category;
use App\Post;
use App\User;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        
    
        // View::composer('*', function($view)
        // {
            
        //     $categories = DB::table('categories')->where('status', 1)->get();
        //     $authors = DB::table('users')->where('type', 2)->get();

        //     $hotnews = Post::where('hot_news',1)->where('status', 1)->get();
        //     $mostview=Post::where('status', 1)->orderBy('view_count','DESC')->limit(5)->get();


            
        //     $view->with('categories', $categories)->with('authors', $authors)->with('hotnews', $hotnews)->with('mostview', $mostview);
        // });

    }
}
