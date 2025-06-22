<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id'=> Post::inRandomOrder()->first()->id,
            // 'post_id'=> Post::pluck('id')->random(),
            'content'=> fake()->paragraph(),
            'author'=> fake()->name(),
        ];
    }
}
