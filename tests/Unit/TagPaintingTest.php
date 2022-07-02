<?php

namespace Tests\Unit;

use App\Models\PaintingTag;
use PHPUnit\Framework\TestCase;

class TagPaintingTest extends TestCase
{
    public function test_to_see_if_tag_model_exists()
    {
        $paintingTag = new PaintingTag();

        $this->assertInstanceOf(PaintingTag::class, $paintingTag);

    }

}
