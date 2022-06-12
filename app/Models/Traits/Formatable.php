<?php

namespace App\Models\Traits;

use App\Services\Settings\Facades\Setting;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait Formatable
{
    protected function relativeCreatedAt(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->formatRelativeDate($this->created_at)
        );
    }

    protected function relativeUpdatedAt(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->formatRelativeDate($this->updated_at)
        );
    }

    protected function relativeDeletedAt(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->formatRelativeDate($this->deleted_at)
        );
    }

    protected function relativePublishedAt(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->formatRelativeDate($this->published_at)
        );
    }

    protected function formatRelativeDate(Carbon $datetime = null, bool $withTime = true): string
    {
        if (!$datetime) {
            return '';
        }

        $diff = $datetime->diffInDays(Carbon::now());
        $time = $datetime->format(Setting::get('time_format', 'h:i a'));

        if ($diff <= 1) {
            $relative = 'Today ';
            $relative .= $withTime ? ' at ' . $time : '';
        } elseif ($diff > 1 && $diff <= 2) {
            $relative = 'Yesterday';
        } elseif ($diff > 2 && $diff <= 7) {
            $relative = $diff . ' days ago';
        } else {
            $relative = $datetime->format(Setting::get('date_format', 'm/d/Y') . ' ' . Setting::get('time_format', 'h:i a'));
        }

        return $relative;
    }

}
