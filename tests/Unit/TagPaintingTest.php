<?php

namespace Tests\Unit;

use App\Models\Painting;
use App\Models\PaintingTag;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TagPaintingTest extends TestCase
{
    use  DatabaseMigrations;

    /**
     * This test will see if a tag model exists
     * @return void
     */
    public function test_to_see_if_tag_model_exists(): void
    {
        $paintingTag = new PaintingTag();

        $this->assertInstanceOf(PaintingTag::class, $paintingTag);
    }

    /**
     * This test will check to see if the painting tag index exists
     * @return void
     */
    public function test_to_see_if_painting_tag_index_route_exists(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/painting-tag/')
            ->assertStatus(200);
    }

    /**
     * This test will check to see if a tag can be added
     * @return void
     */
    public function test_to_see_if_a_tag_can_be_added(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $painting = Painting::factory(1)->create()->first();

        $response = $this->post('/painting-tag/', ["category" => "TestCategory", "painting_id" => $painting->id]);

        $response->assertStatus(200);

        $this->assertDatabaseCount('painting_tags', 1);
    }


    /**
     * This test will see if a user can edit a tag
     * @return void
     */
    public function test_to_see_if_a_user_can_edit_a_tag(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $painting = Painting::factory(1)->create()->first();

        $this->post('/painting-tag/', ["category" => "TestCategory", "painting_id" => $painting->id]);

        $painting = Painting::factory(2)->create();

        $response = $this->put('/painting-tag/1', ["category" => "TestCategory2", "painting_id" => 2]);

        $response->assertStatus(200);
    }

    public function test_to_see_if_a_user_can_delete_a_tag()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $painting = Painting::factory(1)->create()->first();

        $this->post('/painting-tag/', ["category" => "TestCategory", "painting_id" => $painting->id]);

        $response = $this->delete('/painting-tag/1');

        $response->assertStatus(200);

        $this->assertDatabaseCount('painting_tags', 0);
    }


}
