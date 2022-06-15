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

}
