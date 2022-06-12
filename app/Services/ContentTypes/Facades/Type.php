<?php

namespace App\Services\ContentTypes\Facades;

use App\Services\ContentTypes\ContentTypeService;
use Illuminate\Support\Facades\Facade;

/**
 * @method fetch() ContentTypeService
 * @method model() ContentTypeService
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
        return ContentTypeService::class;
    }
}
