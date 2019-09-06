<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Rashidul\RainDrops\Controllers\BaseController;
use Illuminate\Support\Str;

class TagController extends BaseController
{

    protected $modelClass = Tag::class;

    public function storing()
    {
        $this->model->slug = Str::slug($this->request->get('name'));
    }

    public function updating()
    {
        $this->model->slug = Str::slug($this->request->get('name'));
    }
}
