<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaintingImage>
 */
class PaintingTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category' => $this->faker->word(),
            'painting_id' => function () {
                $factory = Factory::factoryForModel(\App\Models\Painting::class);
                return $factory->create()->id;
            }
        ];
    }
}
