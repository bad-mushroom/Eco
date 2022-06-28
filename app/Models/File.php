<?php

namespace App\Models;

use App\Models\Traits\Uuidable;
use App\Services\Settings\Facades\Setting;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use Uuidable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'filename',
        'object_filename',
        'mime',
        'size',
        'label',
        'description',
        'user_id',
    ];

    // -- Relationships

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // -- Accessors & Mutators

    public function readableFileSize(): Attribute
    {
        if ($this->size >= 1<<30) {
            $value = number_format($this->size / (1<<30), 2) . ' GB';
        } elseif ($this->size >= 1<<20) {
            $value = number_format($this->size / (1<<20), 2) . ' MB';
        } elseif ($this->size >= 1<<10) {
            $value = number_format($this->size / (1<<10), 1) . ' KB';
        } else {
            $value = number_format($this->size) . ' Bytes';
        }

        return Attribute::make(
            get: fn () => $value
        );
    }

    public function type(): Attribute
    {
        if (str_contains($this->mime, 'image')) {
            $type = 'image';
        } elseif (str_contains($this->mime, 'application')) {
            $type = 'archive';
        } elseif (str_contains($this->mime, 'audio')) {
            $type = 'audio';
        } elseif (str_contains($this->mime, 'video')) {
            $type = 'video';
        } elseif (str_contains($this->mime, 'text')) {
            $type = 'alt';
        } else {
            $type = 'archive';
        }

        return Attribute::make(
            get: fn () => $type
        );
    }
}
