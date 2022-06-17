<?php

namespace Tests\Unit;

use Tests\TestCase;

class PaintingMigrationTest extends TestCase
{
    /**
     * This will test if the Painting Migration exists.
     *
     * @return void
     */
   public function test_to_see_if_database_has_ten_fake_entries()
   {
        $this->assertDatabaseCount('paintings', 10);
   }
}
