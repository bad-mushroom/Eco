<?php

namespace Tests\Unit\Models\Traits;

use PHPUnit\Framework\TestCase;

class SluggableTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $content = new \App\Models\Content;
        dd($content->save());
        $this->assertTrue(true);
    }
}
