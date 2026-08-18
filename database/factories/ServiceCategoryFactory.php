<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ServiceCategory>
 */
class ServiceCategoryFactory extends Factory
{
    public function forService(Service $service): static
    {
        return $this->state(fn () => ['service_id' => $service->id]);
    }

    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);

        return [
            'service_id' => Service::factory(),
            'parent_id' => null,
            'name' => ucfirst($name),
            'slug' => \Illuminate\Support\Str::slug($name),
            'description' => fake()->sentence(),
            'is_active' => true,
            'sort_order' => 0,
        ];
    }
}
