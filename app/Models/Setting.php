<?php

namespace App\Models;

use App\Models\Traits\Sluggable;
use App\Models\Traits\Uuidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory, Sluggable, Uuidable;

    protected $sluggableColumn = 'label';
    protected $sluggableSeparator = '_';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'label',
        'slug',
        'description',
        'value',
        'default',
    ];

    // -- Relationships

    public function type()
    {
        return $this->belongsTo(SettingType::class, 'setting_type_id');
    }
}
