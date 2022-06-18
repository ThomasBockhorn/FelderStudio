<?php

namespace Tests\Unit;

use App\Models\PaintingImages;
use App\Models\User;
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


    /**
     * This test will check if the painting-images/ route works
     * @return void
     */
    public function test_to_see_if_painting_images_resource_index_works()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/paintings-images/')
            ->assertStatus(200);

    }

    public function test_will_check_to_see_if_painting_images_create_route_works()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/paintings-images/create')
            ->assertStatus(200);

    }


}
