<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait Uuidable
{
    /**
     * Populates UUID as the model's PK.
     *
     * @return void
     */
    protected static function bootUuidable()
    {
        static::creating(function ($resource) {
            if (!$resource->getKey()) {
                $resource->{$resource->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * PK Does not increments
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * PK is a string
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}
