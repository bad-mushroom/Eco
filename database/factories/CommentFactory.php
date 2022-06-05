<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContentType>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'body' => $this->faker->sentence(),
        ];
    }

    public function author(string $id = null)
    {
        return $this->state(function (array $attributes) use ($id) {
            return [
                'user_id' => $id ?? User::factory()->create()->id,
            ];
        });
    }
}
