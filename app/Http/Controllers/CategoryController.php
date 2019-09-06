<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Rashidul\RainDrops\Controllers\BaseController;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{

    protected $modelClass = Category::class;
    protected $createView = 'categories.form';
    protected $editView = 'categories.form';

    public function creating()
    {
        $this->viewData['form_action'] = url('admin/categories');
        $this->viewData['action'] = 'create';
        $this->viewData['item'] = new Category;
    }

    public function editing()
    {
        $this->viewData['form_action'] = $this->model->getShowUrl();
        $this->viewData['action'] = 'edit';
        $this->viewData['action'] = 'edit';
    }

    public function storing()
    {
        $this->model->slug = Str::slug($this->request->get('name'));
    }

    public function updating()
    {
        $this->model->slug = Str::slug($this->request->get('name'));
    }


}
