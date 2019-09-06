<?php

namespace App\Site\Services;


use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleService
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function listArticlesByCategory($slug = '')
    {
        $articles = Article::published()->select();

        if ($slug == '' && $this->request->has('category')){
            $slug = $this->request->get('category');
        }

        $category = Category::where('slug', $slug)->first();

        if ($category != null){
            $articles->where('category_id', $category->id);
        }

        return $articles->paginate(5);

    }

    public function listArticlesByTag($slug = '')
    {
//        $articles = Article::published()->select();

        $tag = Tag::where('slug', $slug)->first();

        return $tag->articles()->published()->paginate(5);

    }
}