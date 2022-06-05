<?php

namespace App\Models\Traits;

use App\Models\Tag;

trait Taggable
{
    /**
     * Get all of the tags for the model.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
