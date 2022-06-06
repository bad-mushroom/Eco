<?php

namespace App\Services\Settings\Facades;

use App\Services\Settings\SettingsService;
use Illuminate\Support\Facades\Facade;

class Setting extends Facade
{
    /**
    * Get the registered name of the component.
    *
    * @return string
    */
    protected static function getFacadeAccessor()
    {
        return SettingsService::class;
    }
}
