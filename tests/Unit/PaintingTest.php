<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Painting;
use App\Models\User;

class PaintingTest extends TestCase
{
    use RefreshDatabase;
    /**
     * This simple test will check to see if the Painting Model exists
     * @return void
     */
    public function test_If_Painting_Model_Exists()
    {
        $painting = new Painting();

        $this->assertInstanceOf(Painting::class, $painting);
    }


    /**
     * This test will check if migration of the painting model works
     * @return void
     */
    public function test_if_painting_database_table_has_10_entries()
    {
        $this->seed();

        $this->assertDatabaseCount('paintings', 10);
    }


    /**
     * This tests checks if the painting resource index works
     * @return void
     */
    public function test_if_the_painting_resource_index_route_works()
    {

        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/paintings/')
            ->assertStatus(200);
    }


    /**
     * This test will check if the painting/create route works
     * @return void
     */
    public function test_to_see_if_a_user_can_access_the_create_route()
    {
       $user = User::factory()->create();

        $this->actingAs($user)
                ->get('/paintings/create')
                ->assertStatus(200);

    }


    /**
     * This tests will check if a painting entry can be added
     * @return void
     */
    public function test_to_see_if_a_painting_entry_can_be_added()
    {
        $entry = [ "title" => "Test Title", "description" => "Test description"];

        $user = User::factory()->create();

        $this->actingAs($user);
        $this->post('/paintings', $entry, ['Accept' => 'application/json']);
        $this->assertDatabaseCount("paintings",1);

    }


}
