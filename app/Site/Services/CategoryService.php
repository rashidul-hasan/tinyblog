<?php

namespace App\Site\Services;

use Illuminate\Http\Request;

class CategoryService
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getCategoryNameById($id)
    {

    }

}