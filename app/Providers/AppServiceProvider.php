<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Article;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // 🔥 FORCE HTTPS (INI WAJIB)
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // Navbar data
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