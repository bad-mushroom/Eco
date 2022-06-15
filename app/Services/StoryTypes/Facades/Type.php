<?php

namespace App\Services\StoryTypes\Facades;

use App\Services\StoryTypes\StoryTypeService;
use Illuminate\Support\Facades\Facade;

/**
 * @method fetch() StoryTypeService
 * @method model() StoryTypeService
 */
class Type extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return StoryTypeService::class;
    }
}
