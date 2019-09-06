<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Rashidul\RainDrops\Controllers\BaseController;

class ArticleController extends BaseController
{

    protected $modelClass = Article::class;
    protected $articleService;

    protected $createView = 'articles.form';
    protected $editView = 'articles.form';

    public function __construct(ArticleService $articleService)
    {
        parent::__construct();
        $this->articleService = $articleService;

        $this->crudAction->restrictActions(['view']);
    }

    public function indexing()
    {
        $this->viewData['table']->setOptions([
            'responsive' => false,
            'pageLength' => 50
        ]);
    }

    public function creating()
    {
        $this->viewData['cat_parents'] = Category::all();
        $this->viewData['tags'] = Tag::all();
        $this->viewData['item'] = new Article();
        $this->viewData['article_tags'] = [];
        $this->viewData['action'] = 'create';
        $this->viewData['form_action'] = url('admin/articles');
    }

    public function editing()
    {
        $this->viewData['cat_parents'] = Category::all();
        $this->viewData['tags'] = Tag::all();
        $this->viewData['article_tags'] = $this->model->tags->pluck('id')->toArray();
        $this->viewData['action'] = 'edit';
        $this->viewData['form_action'] = url('admin/articles/' . $this->model->id);
        $this->viewData['item'] = $this->model;
    }

    public function store()
    {
        $this->validateRequest();

        return $this->articleService->store();
    }

    public function update(Request $request, $id)
    {
        $this->validateRequest();

        return $this->articleService->update($id);
    }

    protected function buildTree(array $elements, $parentId = 0, $depth) {
        $branch = array();
        $depth = 0;

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->buildTree($elements, $element['id'], $depth++);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }

    public function newArticlesDataTable()
    {
        return $this->articleService->unapprovedDatatable();
    }

    private function validateRequest()
    {
        $this->validate($this->request, [
            'title' => 'required'
        ]);
    }

}
