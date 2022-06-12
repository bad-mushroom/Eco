<?php

namespace App\Models\Traits;

use App\Models\Tag;
use Illuminate\Support\Str;

trait Taggable
{
    /**
     * Get all of the tags for the model.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')
            ->withTimestamps();
    }

    public function createAndAssociateTags(array $tags)
    {
        foreach ($tags as $label) {
            $label = trim($label);

            if (!empty($label)) {
                $tag = Tag::firstOrCreate(['label' => Str::title($label)]);
                $this->tags()->save($tag);
            }
        }
    }
}
