<?php

namespace App\Services;


use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ArticleService
{
    protected $request;
    protected $dataTable;

    public function __construct(Request $request, DataTables $dataTables)
    {
        $this->request = $request;
        $this->dataTable = $dataTables;
    }

    public function store()
    {
        $input = $this->request->all();

        $input['slug'] = Str::slug($input['title']);
        $input['posted_at'] = Carbon::now();
        $input['author_id'] = Auth::user()->id;

        $article = Article::create($input);

        $article = $this->handleDraftState($article);
        $this->syncTags($article);

        return response()->json([
            'success' => true,
            'message' => 'Article created successfully & submitted for approval',
            'edit_url' => $article->getEditUrl(),
            'view_url' => url('article', $article->slug)
        ], 200);

    }


    public function unapprovedDatatable()
    {
        $query = Article::unapproved()->select();

    }

    public function update($id)
    {
        $article = Article::findOrFail($id);
        $input = $this->request->all();
        $article->slug = Str::slug($input['title']);

        $article->update($input);
        $this->syncTags($article);

        return response()->json([
            'success' => true,
            'message' => 'Article updated successfully',
            'edit_url' => $article->getEditUrl(),
            'view_url' => url('article', $article->slug)
        ], 200);

    }

    private function handleDraftState($article)
    {
        if ($this->request->has('is_draft')) {
            $article->is_draft = 1;
        } else {
            $article->is_draft = 0;
        }

        return $article;
    }

    /**
     * @param $article
     */
    private function syncTags($article)
    {
        if ($this->request->has('tags')) {
            $tags = $this->request->get('tags');
            $article->tags()->sync($tags);
        }
    }
}