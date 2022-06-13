<?php

namespace App\Models;

use App\Models\Traits\Commentable;
use App\Models\Traits\Formatable;
use App\Models\Traits\Sluggable;
use App\Models\Traits\Taggable;
use App\Models\Traits\Uuidable;
use App\Services\ContentTypes\Facades\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
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
        'content_type_id',
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
     * Register created and updated methods for content type aliases.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // Called before model is saved to the database
        static::saving(function ($content) {
            $alias = Type::fetch($content->type->slug);

            if (method_exists($alias, 'onSaving')) {
                $alias->onSaving($content);
            }
        });

        // Called after the model is saved to the database
        static::saved(function ($content) {
            $alias = Type::fetch($content->type->slug);

            if (method_exists($alias, 'onSaved')) {
                $alias->onSaved($content);
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
        return $this->belongsTo(ContentType::class, 'content_type_id');
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
        $page = ContentType::where('slug', 'page')->first();
        return $query->where('content_type_id', '!=', $page->id);
    }

}
