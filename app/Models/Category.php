<?php

namespace App\Models;

use App\Traits\Checkbox;
use App\Traits\Localisation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Rashidul\RainDrops\Model\RainDropsSupport;

class Category extends Model
{

    use RainDropsSupport;

    protected $table = 'categories';

    protected $fillable = [
	    'name',
	    'slug'
	];

    protected $baseUrl = 'admin/categories';
    protected $entityName = 'Category';
    protected $entityNamePlural = 'Categories';

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function publishedArticles()
    {
        return $this->articles()->where('status', 'published');
    }

    public function getListLink()
    {
        $url = url('category/' . $this->slug);
        $lang = App::getLocale();
        if (in_array($lang, ['ar', 'som'])){
            $url .= '?lang=' . $lang;
        }

        return $url;
    }
    
    protected $fields = [
	    'name' => [
	        'label' => 'Name',
	        'type' => 'text',
            'index' => true,
            'validations' => 'required'
        ],
        'slug' => [
	        'label' => 'Slug',
	        'type' => 'text',
            'index' => true,
            'form' => false
        ]
	];



}
