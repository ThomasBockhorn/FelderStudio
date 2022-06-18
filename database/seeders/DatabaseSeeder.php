<?php

namespace Database\Seeders;

use App\Models\PaintingImage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         PaintingImage::factory(10)->create();
    }
}
