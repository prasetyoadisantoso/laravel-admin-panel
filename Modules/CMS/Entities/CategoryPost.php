<?php

namespace Modules\CMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryPost extends Model
{
    use HasFactory;

    // protected $fillable = ['category_id', 'post_id'];

    protected static function newFactory()
    {
        return \Modules\CMS\Database\factories\CategoryPostFactory::new();
    }
}
