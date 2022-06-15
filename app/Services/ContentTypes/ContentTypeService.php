<?php

namespace App\Services\StoryTypes;

use App\Http\StoryTypes\Interfaces\StoryTypeInterface;
use App\Models\StoryType;
use Illuminate\Support\Str;

class StoryTypeService
{
    /**
     * Find the StoryType model based on its `slug`.
     *
     * @param string $slug
     * @return StoryType
     */
    public function model(string $slug): StoryType
    {
        return StoryType::where('slug', $slug)->first();
    }

    /**
     * Fetch an instance of the Story Alias model (e.g. Post, Note, etc)
     *
     * @param string $slug
     * @return StoryTypeInterface
     */
    public function fetch(string $slug)
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
        return 'App\Models\StoryTypes\\' . Str::title($slug);
    }
}
