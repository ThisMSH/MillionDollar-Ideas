<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $image = fake()->image(null, 360, 460, 'animals', true, true, 'cats', false, 'jpg');
        // $path = Storage::putFile('public/posts', $image);

        return [
            'Title' => fake()->sentence(), // Generate a random sentence that contains 6 words
            'Topic' => fake()->paragraph(50),
            // 'Image' => "posts/" . basename($image),
            'Image' => null,
            'User_id' => User::all()->random()->id, // This wil get a random ID from the table of users
            'Category_id' => Categories::all()->random()->id
        ];
    }
}
