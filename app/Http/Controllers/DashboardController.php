<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard.index');
    }

    public function count()
    {
        $articles = Article::all();

        $articles_published = $articles->filter(function ($item){
           return $item->status == Article::STATUS_PUBLISHED;
        });

        $articles_unpublished = $articles->filter(function ($item){
            return $item->status == Article::STATUS_UNPUBLISHED;
        });

        return response()->json([
            'articles_total' => $articles->count(),
            'articles_published' => $articles_published->count(),
            'articles_unpublished' => $articles_unpublished->count(),
            'categories' => Category::all()->count()
        ], 200);
    }
}
