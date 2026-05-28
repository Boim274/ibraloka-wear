<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::where('is_published', true)
            ->latest('published_at')
            ->take(4)
            ->get();

        $categories = Article::where('is_published', true)
            ->select('category')
            ->distinct()
            ->pluck('category');

        $popularArticles = Article::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        $featuredProducts = Product::where('is_featured', true)
            ->latest()
            ->take(6)
            ->get();

        $galleries = Gallery::latest()->get();

        $events = Event::where('is_published', true)
            ->latest('event_date')
            ->get();

        return view('home', compact('articles', 'categories', 'popularArticles', 'featuredProducts', 'galleries', 'events'));
    }
}
