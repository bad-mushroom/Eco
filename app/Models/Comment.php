<?php

namespace App\Models;

use App\Models\Traits\Formatable;
use App\Models\Traits\Taggable;
use App\Models\Traits\Uuidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use Formatable, HasFactory, Taggable, Uuidable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'body',
        'session',
        'author',
        'is_approved',
    ];

    // -- Relationships

    /**
     * Get all of the models that own comments.
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // -- Scopes

    public function scopeByState($query, $approved = null)
    {
        if (is_null($approved)) {
            return $query;
        }
        return $query->where('is_approved', $approved);
    }

    public function scopeByStory($query, string $id = null)
    {
        if (is_null($id)) {
            return $query;
        }

        return $query->where('commentable_id', $id);
    }

}
