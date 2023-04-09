<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                "Category" => "Art",
                "Icon" => "art.png"
            ],
            [
                "Category" => "Books",
                "Icon" => "books.png"
            ],
            [
                "Category" => "Fashion",
                "Icon" => "fashion.png"
            ],
            [
                "Category" => "Food",
                "Icon" => "food.png"
            ],
            [
                "Category" => "Health",
                "Icon" => "health.png"
            ],
            [
                "Category" => "Movies",
                "Icon" => "movies.png"
            ],
            [
                "Category" => "Music",
                "Icon" => "music.png"
            ],
            [
                "Category" => "News",
                "Icon" => "news.png"
            ],
            [
                "Category" => "Traveling",
                "Icon" => "traveling.png"
            ],
            [
                "Category" => "Sport",
                "Icon" => "sport.png"
            ],
        ];

        foreach($categories as $key => $value) {
            Categories::create($value);
        }
    }
}
