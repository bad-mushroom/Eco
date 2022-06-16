<?php

namespace App\Models;

use App\Models\Traits\Commentable;
use App\Models\Traits\Formatable;
use App\Models\Traits\Sluggable;
use App\Models\Traits\Taggable;
use App\Models\Traits\Uuidable;
use App\Services\StoryTypes\Facades\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use Commentable, Formatable, HasFactory, Sluggable, Taggable, Uuidable;

    /**
     * Sluggable Column.
     *
     * @var string $sluggableColumn
     */
    protected $sluggableColumn = 'subject';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subject',
        'summary',
        'slug',
        'body',
        'story_type_id',
        'published_at',
        'user_id',
        'featured_image',
        'is_featured',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'datetime',
    ];

    // -- Lifecycle


    /**
     * Model Boot.
     *
     * Register created and updated methods for story type aliases.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // Called before model is saved to the database
        static::saving(function ($story) {
            $alias = Type::fetch($story->type->slug);

            if (method_exists($alias, 'onSaving')) {
                $alias->onSaving($story);
            }
        });

        // Called after the model is saved to the database
        static::saved(function ($story) {
            $alias = Type::fetch($story->type->slug);

            if (method_exists($alias, 'onSaved')) {
                $alias->onSaved($story);
            }
        });
    }

    // -- Relationships

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function type()
    {
        return $this->belongsTo(StoryType::class, 'story_type_id');
    }

    // -- Scopes

    public function scopeByType($query, string $slug = '*')
    {
        if ($slug === '*') {
            return $query;
        }

        return $query->whereHas('type', function($query) use ($slug) {
            return $query->where('slug', $slug);
        });
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function scopeNotFeatured($query)
    {
        return $query->where('is_featured', false);
    }

    public function scopeNotPages($query)
    {
        $page = StoryType::where('slug', 'page')->first();
        return $query->where('story_type_id', '!=', $page->id);
    }

    public function scopeForType($query, $slug)
    {
        return $query->whereHas('type', function ($query) use ($slug) {
            return $query->where('slug', $slug);
        });
    }

    public function scopeByTag($query, string $slug = '*')
    {
        if ($slug === '*') {
            return $query;
        }

        return $query->whereHas('tags', function ($query) use ($slug) {
            return $query->where('slug', $slug);
        });
    }

    public function scopeSearch($query, string $search = null)
    {
        if (!$search) {
            return $query;
        }

        return $query->where('subject', 'like', '%' . $search . '%')
            ->orWhere('summary', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%');
    }

}
