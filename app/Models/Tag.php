<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the posts that belong to the tag.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
 
    /**
     * Get all of the videos that are assigned this tag.
     */
    public function categories()
    {
        return $this->morphedByMany(Category::class, 'taggable');
    }
}
