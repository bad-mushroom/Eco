<?php

namespace App\Models;

use App\Models\Traits\Sluggable;
use App\Models\Traits\Uuidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory, Sluggable, Uuidable;

    protected $sluggableColumn = 'label';

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

    public function taggable()
    {
        return $this->morphTo();
    }

    public function stories()
    {
        return $this->morphedByMany(Story::class, 'taggable');
    }

    public function comments()
    {
        return $this->morphedByMany(Comment::class, 'taggable');
    }
}
