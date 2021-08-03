<?php

namespace Rapidez\MageplazaBlog;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Rapidez\Core\RapidezFacade as Rapidez;
use Rapidez\MageplazaBlog\Models\BlogPost;

class MageplazaBlogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $prefix = Rapidez::config('blog/general/url_prefix', 'blog');
        $suffix = ($suffix = Rapidez::config('blog/general/url_suffix', 'html')) ? '.'.$suffix : '';

        Route::get($prefix.'/{slug}'.$suffix, function ($slug) {
            $post = BlogPost::where('url_key', $slug)->firstOrFail();

            return view('mageplazablog::post', compact('post'));
        })->name('blogpost');

        Route::get($prefix.$suffix, function () {
            $posts = BlogPost::orderByDesc('publish_date')->get();

            return view('mageplazablog::posts', compact('posts'));
        });

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'mageplazablog');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/rapidez/mageplaza-blog'),
        ], 'views');
    }
}
