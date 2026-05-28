<?php

namespace App\Providers;

use App\Models\Article;
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
        if (config('app.env') === 'local') {
            $this->app->make('url')->forceRootUrl(request()->getSchemeAndHttpHost());
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
