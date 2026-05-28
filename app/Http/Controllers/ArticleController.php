<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index($kategori = null)
    {
        $query = Article::where('is_published', true);

        if ($kategori) {
            $query->where('category', $kategori);
        }

        $featured = (clone $query)->latest('published_at')->first();

        $articles = (clone $query)
            ->when($featured, fn($q) => $q->where('id', '!=', $featured->id))
            ->latest('published_at')
            ->paginate(9);

        $categories = Article::where('is_published', true)
            ->select('category')
            ->distinct()
            ->pluck('category');

        $category = $kategori ? ucfirst(str_replace('-', ' ', $kategori)) : null;

        return view('artikel.index', compact('articles', 'categories', 'category', 'kategori', 'featured'));
    }

    public function show($kategori, $slug)
    {
        $article = Article::where('slug', $slug)
            ->where('category', $kategori)
            ->where('is_published', true)
            ->firstOrFail();

        $related = Article::where('is_published', true)
            ->where('category', $kategori)
            ->where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        $category = ucfirst(str_replace('-', ' ', $kategori));

        return view('artikel.show', compact('article', 'category', 'kategori', 'related'));
    }
}
