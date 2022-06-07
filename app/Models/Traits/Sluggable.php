<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

trait Sluggable
{
    /**
     * Set slug value on saving.
     */
    protected static function bootSluggable()
    {
        static::saving(function ($resource) {
            if (empty($resource->slug)) {
                $resource->slug = $resource->slug;
            }
        });
    }

    /**
     * Fetch sluggable column from model.
     *
     * @return string
     */
    protected function getSluggableColumn(): string
    {
        if (!property_exists($this, 'sluggableColumn')) {
            throw new \Exception("Sluggable trait requires `protected \$sluggableColumn = '<attribute>';` property on the model class");
        }

        return $this->sluggableColumn;
    }

    /**
     * Fetch the separator to be used for slugs.
     *
     * @return string
     */
    protected function getSluggableSeparator(): string
    {
        if (property_exists($this, 'sluggableSeparator')) {
            return $this->sluggableSeparator;
        }

        return '-';
    }

    /**
     * Slug Getter/Setter.
     *
     * @return Attribute
     */
    protected function slug(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value, $attributes) => empty($value)
                ? Str::slug($attributes[$this->getSluggableColumn()], $this->getSluggableSeparator())
                : $value,
        );
    }
}
