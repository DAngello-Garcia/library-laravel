<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['fiction', 'fantasy', 'romance', 'thriller', 'science fiction'];
        shuffle($categories);
        $numCategories = rand(1, 3);
        $selectedCategories = array_slice($categories, 0, $numCategories);
        $width = rand(300, 350);
        $height = rand(200, 300);

        return [
            'isbn' => $this->faker->isbn13,
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'categories' => $selectedCategories,
            'publisher' => $this->faker->company,
            'publication_date' => $this->faker->date,
            'pages' => $this->faker->numberBetween(100, 500),
            'cover' => "https://picsum.photos/{$width}/{$height}",
            'available' => true,
        ];
    }
}
