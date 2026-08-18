<?php

namespace Database\Factories;

use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Portfolio>
 */
class PortfolioFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->unique()->words(4, true);

        return [
            'title' => ucfirst($title),
            'slug' => \Illuminate\Support\Str::slug($title),
            'description' => fake()->paragraph(),
            'cover_image' => null,
            'service_id' => Service::factory(),
            'is_published' => true,
        ];
    }
}
