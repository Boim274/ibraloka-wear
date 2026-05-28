<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Article;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalRevenue = Order::whereNotIn('status', ['cancelled'])->sum('total') ?? 0;
        $pendingOrders = Order::where('status', 'pending')->count();
        $ordersThisMonth = Order::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();

        $ordersByStatus = Order::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        $monthlyRevenue = Order::whereNotIn('status', ['cancelled'])
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'), DB::raw('SUM(total) as total'))
            ->whereYear('created_at', now()->year)
            ->groupBy('year', 'month')
            ->orderBy('month')
            ->get();

        $monthlyOrders = Order::select(DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as count'))
            ->whereYear('created_at', now()->year)
            ->groupBy('year', 'month')
            ->orderBy('month')
            ->get();

        $recentOrders = Order::with('user')->latest()->take(5)->get();

        $counts = [
            'articles' => Article::count(),
            'products' => Product::count(),
            'events' => Event::count(),
            'galleries' => Gallery::count(),
            'messages' => Message::count(),
            'orders' => $totalOrders,
        ];

        return view('dashboard', compact(
            'totalOrders', 'totalRevenue', 'pendingOrders', 'ordersThisMonth',
            'ordersByStatus', 'monthlyRevenue', 'monthlyOrders', 'recentOrders', 'counts'
        ));
    }
}
