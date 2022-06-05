<?php

namespace Database\Factories;

use App\Models\ContentType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContentType>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->words(3, true),
            'body'    => $this->faker->sentence(),
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

    public function type(string $id = null)
    {
        return $this->state(function (array $attributes) use ($id) {
            return [
                'content_type_id' => $id ?? ContentType::factory()->create()->id,
            ];
        });
    }
}
