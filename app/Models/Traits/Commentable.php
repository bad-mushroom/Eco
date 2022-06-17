<?php

namespace App\Models\Traits;

use App\Models\Comment;

trait Commentable
{
    /**
     * Comments relationship.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')
            ->orderByDesc('created_at');
    }
}
