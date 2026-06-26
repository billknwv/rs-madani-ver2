<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::published()->latest()->paginate(9);
        return view('frontend.articles', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->where('status', 'publish')->firstOrFail();
        $relatedArticles = Article::where('id', '!=', $article->id)
            ->where('status', 'publish')
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.article-detail', compact('article', 'relatedArticles'));
    }
}
