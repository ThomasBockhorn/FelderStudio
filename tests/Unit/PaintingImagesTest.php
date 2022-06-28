<?php

namespace Tests\Unit;

use App\Models\Painting;
use App\Models\PaintingImage;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PaintingImagesTest extends TestCase
{

    use  DatabaseMigrations;

    /**
     * This function will create a user for the tests
     * @return void
     */
    protected function createUser(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);
    }

    /**
     * This test will see if the painting images model exists
     * @return void
     */
    public function test_to_see_if_painting_images_model_exists(): void
    {
        $paintingImages = new PaintingImage();

        $this->assertInstanceOf(PaintingImage::class, $paintingImages);
    }


    /**
     * This tests checks if the painting images migration works
     * @return void
     */
    public function test_to_see_if_painting_images_database_has_10_entries(): void
    {
        $this->seed();

        $this->assertDatabaseCount("painting_images", 10);
    }


    /**
     * This test will check if the painting-images/ route works
     * @return void
     */
    public function test_to_see_if_painting_images_resource_index_works(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/painting-images/')
            ->assertStatus(200);
    }


    /**
     * This test will see the create/painting-images route works
     * @return void
     */
    public function test_will_check_to_see_if_painting_images_create_route_works(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/painting-images/create')
            ->assertStatus(200);
    }


    /**
     * This test will see if the user can add a painting image to database and images/
     * @return void
     */
    public function test_will_check_if_a_user_can_add_images_to_painting_images(): void
    {
        $this->createUser();

        $imageFile = UploadedFile::fake()->image('testImage.jpg');

        $painting = Painting::factory(1)->create()->first();

        $response = $this->post(
            '/painting-images',
            ['filename' => $imageFile, 'painting_id' => $painting->id],
            ['Accept' => 'application/json']
        );

        $this->assertDatabaseCount('painting_images', 1);

        $response->assertStatus(200);
    }

    public function test_to_see_if_a_user_can_edit_a_painting_image(): void
    {
        $this->createUser();

        $imageFile = UploadedFile::fake()->image('testImage.jpg');

        $painting = Painting::factory(1)->create()->first();

        $this->post(
            '/painting-images',
            ['filename' => $imageFile, 'painting_id' => $painting->id],
            ['Accept' => 'application/json']
        );

        $imageFile2 = UploadedFile::fake()->image('testImage2.jpg');

        $response = $this->put(
            '/painting-images/1',
            ['filename' => $imageFile2, 'painting_id' => $painting->id],
            ['Accept' => 'application/json']
        );

        $response->assertStatus(200);
    }


}
