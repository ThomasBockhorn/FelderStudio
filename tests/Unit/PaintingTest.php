<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Painting;

class PaintingTest extends TestCase
{

    /**
     * This simple test will check to see if the Painting Model exists
     * @return void
     */
    public function testIfPaintingModelExists()
    {
        $painting = new Painting();

        $this->assertInstanceOf(Painting::class, $painting);
    }
}
