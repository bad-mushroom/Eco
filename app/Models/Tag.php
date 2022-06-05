<?php

namespace App\Models;

use App\Models\Traits\Uuidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory, Uuidable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'label',
        'slug'
    ];

    // -- Relationships

    /**
     * Get all of the models that own comments.
     */
    public function taggable()
    {
        return $this->morphTo();
    }

    public function contents()
    {
        return $this->morphedByMany(Content::class, 'taggable');
    }

    public function comments()
    {
        return $this->morphedByMany(Comment::class, 'taggable');
    }
}
