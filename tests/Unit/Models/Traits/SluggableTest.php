<?php

namespace Tests\Unit\Models\Traits;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SluggableTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSlugIsSetOnSaving()
    {
        $storyType = \App\Models\StoryType::factory()->make();
        $this->assertEmpty($storyType->slug);

        $storyType->save();
        $this->assertNotEmpty($storyType->slug);
    }
}
