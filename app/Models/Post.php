<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{

    /** @use HasFactory<PostFactory> */
    use HasFactory;

    /**
     * @return BelongsToMany<Category, $this>
    */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_post')->withTrashed();
    }
}
