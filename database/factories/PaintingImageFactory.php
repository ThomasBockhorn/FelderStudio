<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaintingImage>
 */
class PaintingImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'filename' => $this->faker->image('public/storage/images', 640, 480, null, false),
            'painting_id' => function () {
                $factory = Factory::factoryForModel(\App\Models\Painting::class);
                return $factory->create()->id;
            }
        ];
    }
}
