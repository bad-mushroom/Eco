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
        $contentType = \App\Models\ContentType::factory()->make();
        $this->assertEmpty($contentType->slug);

        $contentType->save();
        $this->assertNotEmpty($contentType->slug);
    }
}
