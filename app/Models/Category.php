<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'category_post');
    }
}
