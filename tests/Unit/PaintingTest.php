<?php

namespace Tests\Unit;

use App\Models\Painting;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PaintingTest extends TestCase
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
     * This function creates a sample data for the tests
     * @return string[]
     */
    protected function sampleData(): array
    {
        return [ "title" => "Test Title", "description" => "Test description"];
    }


    /**
     * This function returns an edited sample data for the tests
     * @return string[]
     */
    protected function editedSampleData(): array
    {
        return ["title" => "Edited Test Title", "description" => "Edited Test Description"];
    }

    /**
     * This simple test will check to see if the Painting Model exists
     * @return void
     */
    public function test_If_Painting_Model_Exists(): void
    {
        $painting = new Painting();

        $this->assertInstanceOf(Painting::class, $painting);
    }

    /**
     * This tests checks if the painting resource index works
     * @return void
     */
    public function test_if_the_painting_resource_index_route_works(): void
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
    public function test_to_see_if_a_user_can_access_the_create_route(): void
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
    public function test_to_see_if_a_painting_entry_can_be_added(): void
    {

        $this->createUser();

        $this->post('/paintings', $this->sampleData(), ['Accept' => 'application/json']);

        $this->assertDatabaseCount("paintings",1);

    }


    /**
     * This test will check to see if a painting entry can be edited
     * @return void
     */
    public function test_to_see_if_a_user_can_edit_a_painting_entry(): void
    {

        $this->createUser();

        $this->post('/paintings', $this->sampleData(), ['Accept' => 'application/json']);

        $this->put('/paintings/1', $this->editedSampleData(), ['Accept' => 'application/json']);

        $this->assertDatabaseHas("paintings", $this->editedSampleData());
    }

    public function test_to_see_if_user_can_delete_a_painting_entry():void
    {
        $this->createUser();

        $this->post('/paintings', $this->sampleData(), ['Accept' => 'application/json']);

        $this->delete('/paintings/1');

        $this->assertDatabaseMissing("paintings", $this->sampleData());
    }


}
