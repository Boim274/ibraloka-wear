<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

    public function boot(): void
    {
        // FORCE HTTPS di production
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        View::composer('components.navbar', function ($view) {
            $navbarCategories = Article::where('is_published', true)
                ->select('category')
                ->distinct()
                ->pluck('category')
                ->toArray();

            $view->with('navbarCategories', $navbarCategories);
        });
    }
}
