<?php

namespace App\Models;

use App\Traits\Localisation;
use Illuminate\Database\Eloquent\Model;
use Rashidul\RainDrops\Model\RainDropsSupport;

class Tag extends Model
{

    use RainDropsSupport;

    protected $table = 'tags';

    protected $fillable = [
	    'name',
        'slug'
	];

    protected $baseUrl = 'admin/tags';
    protected $entityName = 'Tag';
    protected $entityNamePlural = 'Tags';

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
    
    protected $fields = [
	    'name' => [
	        'label' => 'Name',
	        'type' => 'text',
            'validations' => 'required',
            'index' => true
	    ],
        'slug' => [
            'label' => 'Slug',
            'type' => 'text',
            'index' => true,
            'form' => false
        ]
	];



}
