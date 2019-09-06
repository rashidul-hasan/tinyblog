<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rashidul\RainDrops\Model\RainDropsSupport;

class Article extends Model
{

    use RainDropsSupport;

    const VISIBILITY_SUBSCRIBER = 'subscriber';
    const VISIBILITY_MEMBER = 'member';

    const STATUS_PUBLISHED = 'published';
    const STATUS_UNPUBLISHED = 'unpublished';

    protected $table = 'articles';

    protected $dates = [
        'created_at',
        'updated_at',
        'approved_at'
    ];

    protected $casts = [
        'is_commentable' => 'boolean',
        'is_approved' => 'boolean',
        'is_draft' => 'boolean',
    ];

    protected $fillable = [
	    'title',
	    'title_long',
	    'category_id',
	    'slug',
	    'feature_image',
	    'is_draft',
	    'author_id',
	    'posted_at',
	    'content',
	    'js_header',
	    'js_footer',
	    'css_footer',
	    'css_header',
        'visibility',
        'status'
	];

    protected $baseUrl = 'admin/articles';
    protected $entityName = 'Article';
    protected $entityNamePlural = 'Articles';

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }


    public function getDetailsLink()
    {
        return url('article/' . $this->slug);
    }

    public function membersOnly()
    {
        return $this->visibility === 'member';
    }
    
    protected $fields = [
	    'title' => [
	        'label' => 'Title',
	        'type' => 'text',
            'index' => true
	    ],
	    'slug' => [
	        'label' => 'Slug',
	        'type' => 'text'
	    ],
        'visibility' => [
            'label' => 'Visibility',
            'type' => 'text',
            'index' => true
        ],
        'status' => [
            'label' => 'Status',
            'type' => 'text',
            'index' => true
        ],
	    'posted_at' => [
	        'label' => 'Posted At',
	        'type' => 'datetime',
            'index' => true
        ],
        'category_id' => [
	        'label' => 'Category',
	        'type' => 'relation',
	        'options' => ['category', 'name'],
            'index' => true
        ]
	];



}
