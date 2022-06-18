<?php

namespace Tests\Unit;

use App\Models\PaintingImages;
use Tests\TestCase;

class PaintingImagesTest extends TestCase
{

    /**
     * This test will see if the painting images model exists
     * @return void
     */
    public function test_to_see_if_painting_images_model_exists()
    {
        $paintingImages = new PaintingImages();

        $this->assertInstanceOf(PaintingImages::class, $paintingImages);
    }


    /**
     * This tests checks if the painting images migration works
     * @return void
     */
    public function test_to_see_if_painting_images_database_has_10_entries()
    {
        $this->seed();

        $this->assertDatabaseCount("painting_images", 10);
    }
}
