<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Painting;

class PaintingTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testIfPaintingModelExists()
    {
        $painting = new Painting();

        $this->assertInstanceOf(Painting::class, $painting);
    }
}
