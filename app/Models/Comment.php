<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $guarded = [];    

    public static function boot() {
        parent::boot();
        static::creating(function($comment) {
            $comment->author = auth()->check() ? auth()->id() : 1 ;
        });
    }

    /**
     * Get the parent commentable model (post or user or comment).
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * Get all of the comment's replies.
     */
    public function replies()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'author');
    }
}
