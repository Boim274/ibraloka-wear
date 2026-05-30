<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Message;
use App\Models\Order;
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

        View::composer('layouts.app', function ($view) {
            $unreadMessages = Message::where('is_read', false)->count();
            $pendingOrders = Order::where('status', 'pending')->count();
            $processingOrders = Order::where('status', 'processing')->count();
            $totalNotif = $unreadMessages + $pendingOrders + $processingOrders;

            $recentOrders = Order::with('user')->latest()->take(3)->get();
            $recentMessages = Message::latest()->take(3)->get();

            $notifications = [
                ['count' => $pendingOrders, 'label' => 'Pesanan Pending', 'link' => route('admin.orders.index'), 'icon' => 'pending'],
                ['count' => $processingOrders, 'label' => 'Pesanan Diproses', 'link' => route('admin.orders.index'), 'icon' => 'processing'],
                ['count' => $unreadMessages, 'label' => 'Pesan Masuk', 'link' => route('admin.messages.index'), 'icon' => 'message'],
            ];

            $view->with(compact('unreadMessages', 'pendingOrders', 'processingOrders', 'totalNotif', 'notifications', 'recentOrders', 'recentMessages'));
        });
    }
}
