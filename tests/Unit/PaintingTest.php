<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Painting;

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
}
