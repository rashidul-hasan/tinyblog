<?php

namespace App\Site\Http\Controllers;

use App\Exceptions\ResourceNotFoundException;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Site\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PagesController
{
    protected $request;
    protected $articleService;

    public function __construct(ArticleService $articleService,
                                Request $request)
    {
        $this->request = $request;
        $this->articleService = $articleService;
    }

    public function home()
    {
        session(['url.intended' => url()->current()]);
        $data = [
            'title' => 'Home',
            'articles' => Article::published()->paginate(5)
        ];

        return view('site::pages.home', $data);
    }

    public function articleDetails($slug)
    {
        session(['url.intended' => url()->current()]);

        $article = Article::where('slug', $slug)->first();

        if (!$article){
            return redirect(url('/'));
        }
        // codes
        $js_header = $article->js_header ? $article->js_header : null;
        $js_footer = $article->js_footer ? $article->js_footer : null;
        $css_header = $article->css_header ? $article->css_header : null;
        $css_footer = $article->css_footer ? $article->css_footer : null;

        $articlesForSubscribers = Article::published()
            ->where('visibility', Article::VISIBILITY_SUBSCRIBER)
            ->get(['id', 'title', 'slug']);

        $articlesForMembers = Article::published()
            ->where('visibility', Article::VISIBILITY_MEMBER)
            ->get(['id', 'title', 'slug']);


        $access = $this->determineAccess($article);

        if (is_null($article)){
            throw new ResourceNotFoundException();
        }

        $data = [
            'article' => $article,
            'js_header' => $js_header,
            'css_header' => $css_header,
            'js_footer' => $js_footer,
            'css_footer' => $css_footer,
            'access' => $access,
            'articlesForSubscribers' => $articlesForSubscribers,
            'articlesForMembers' => $articlesForMembers,
            'title' => $article->title_long
        ];

        return view('site::pages.article-details', $data);
    }


    public function listByCategory($slug)
    {
        session(['url.intended' => url()->current()]);

        $category = Category::where('slug', $slug)->first();

        if (is_null($category)){
            throw new ResourceNotFoundException();
        }

        $data = [
            'title' => 'Articles',
            'articles' => $this->articleService->listArticlesByCategory($slug),
            'category' => $category
        ];

        return view('site::pages.home', $data);
    }

    public function listByTag($slug)
    {
        session(['url.intended' => url()->current()]);

        $tag = Tag::where('slug', $slug)->first();

        if (is_null($tag)){
            throw new ResourceNotFoundException();
        }

        $data = [
            'title' => 'Articles',
            'articles' => $this->articleService->listArticlesByTag($slug),
            'tag' => $tag
        ];

        return view('site::pages.home', $data);
    }

    protected function determineAccess($article)
    {
        if (Auth::guest()){
            return 'login';
        }

        if (Auth::check() && (Auth::user()->role === User::ADMIN || Auth::user()->role === User::MEMBER)){
            return 'details';
        }

        if (Auth::check() && Auth::user()->role === User::SUBSCRIBER){
            if ($article->visibility === Article::VISIBILITY_SUBSCRIBER){
                return 'details';
            } else {
                return 'upgrade';
            }
        }
        return 'login';
    }

    public function search()
    {
        session(['url.intended' => url()->current()]);

        $query = $this->request->get('q');

        $articles = Article::published()
            ->where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('content', 'LIKE', '%' . $query . '%')
            ->paginate(5);

        $articles->appends(['q' => $query]);

        $data = [
            'title' => 'Home',
            'articles' => $articles,
            'q' => $query
        ];

        return view('site::pages.home', $data);
    }
}