<?php

namespace App\Services\ContentTypes;

use App\Http\ContentTypes\Interfaces\ContentTypeInterface;
use App\Models\ContentType;
use Illuminate\Support\Str;

class ContentTypeService
{
    /**
     * Find the ContentType model based on its `slug`.
     *
     * @param string $slug
     * @return ContentType
     */
    public function model(string $slug): ContentType
    {
        return ContentType::where('slug', $slug)->first();
    }

    /**
     * Fetch an instance of the Content Alias model (e.g. Post, Note, etc)
     *
     * @param string $slug
     * @return ContentTypeInterface
     */
    public function fetch(string $slug): ContentTypeInterface
    {
        $class = $this->getClassName($slug);

        return new $class();
    }

    /**
     * Determine class name based on `slug`
     *
     * @return string
     */
    protected function getClassName(string $slug): string
    {
        return 'App\Models\ContentTypes\\' . Str::title($slug);
    }
}
