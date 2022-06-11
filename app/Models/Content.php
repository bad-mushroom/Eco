<?php

namespace App\Models;

use App\Models\Traits\Commentable;
use App\Models\Traits\Sluggable;
use App\Models\Traits\Taggable;
use App\Models\Traits\Uuidable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use Commentable, HasFactory, Sluggable, Taggable, Uuidable;

    protected $sluggableColumn = 'subject';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subject',
        'slug',
        'body',
        'is_published',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'datetime',
    ];

    // -- Relationships

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(ContentType::class, 'content_type_id');
    }

    public function scopeByType($query, string $slug = '*')
    {
        if ($slug === '*') {
            return $query;
        }

        return $query->whereHas('type', function($query) use ($slug) {
            return $query->where('slug', $slug);
        });
    }
}
