<?php

namespace Database\Factories;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Comment' => fake()->paragraph(10),
            'User_id' => User::all()->random()->id, // This wil get a random ID from the table of users
            'Post_id' => Posts::all()->random()->id
        ];
    }
}
