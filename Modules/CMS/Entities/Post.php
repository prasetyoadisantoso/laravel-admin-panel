<?php

namespace Modules\CMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'image', 'content'
    ];

    public function categories()
    {
        return $this->belongsToMany('Modules\CMS\Entities\Category', 'category_posts');
    }

    protected static function boot(){
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string)Uuid::generate(4);
        });
    }

    protected static function newFactory()
    {
        return \Modules\CMS\Database\factories\PostFactory::new();
    }
}
