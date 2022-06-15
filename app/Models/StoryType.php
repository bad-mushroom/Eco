<?php

namespace App\Models;

use App\Models\Traits\Sluggable;
use App\Models\Traits\Uuidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryType extends Model
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
        'slug',
        'icon',
        'description',
        'configuration',
        'has_comments',
        'has_preview_image',
        'has_tags',
    ];

    // -- Relationships

    public function stories()
    {
        return $this->hasMany(Story::class);
    }
}
