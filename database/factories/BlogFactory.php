<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Blog>
 */
class BlogFactory extends Factory
{
    protected function title(): string
    {
        return fake()->unique()->sentence(6);
    }

    public function definition(): array
    {
        $title = $this->title();

        return [
            'author_id' => User::factory(),
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'excerpt' => fake()->paragraph(),
            'content' => '<p>'.fake()->paragraphs(3, true).'</p>',
            'cover_image' => null,
            'is_published' => fake()->boolean(70),
            'published_at' => fake()->optional()->dateTimeBetween('-3 months', 'now'),
        ];
    }
}
