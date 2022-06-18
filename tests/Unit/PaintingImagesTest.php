<?php

namespace Tests\Unit;

use App\Models\PaintingImages;
use PHPUnit\Framework\TestCase;

class PaintingImagesTest extends TestCase
{
    public function test_to_see_if_painting_images_model_exists()
    {
        $paintingImages = new PaintingImages();

        $this->assertInstanceOf(PaintingImages::class, $paintingImages);
    }
}
