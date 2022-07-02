<?php

namespace Tests\Unit;

use App\Models\PaintingTag;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TagPaintingTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * This test will see if a tag model exists
     * @return void
     */
    public function test_to_see_if_tag_model_exists()
    {
        $paintingTag = new PaintingTag();

        $this->assertInstanceOf(PaintingTag::class, $paintingTag);
    }

    public function test_to_see_if_painting_tag_index_route_exists()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/painting-tag/')
            ->assertStatus(200);
    }


}
