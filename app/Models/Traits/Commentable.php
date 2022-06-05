<?php

namespace App\Models\Traits;

use App\Models\Comment;

trait Commentable
{
    public function commentable()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
