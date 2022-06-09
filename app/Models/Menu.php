<?php

namespace App\Models;

use App\Models\Traits\Sluggable;
use App\Models\Traits\Uuidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
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

    ];

    // -- Relationships

    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }
}
