<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use App\Enums\UserRole;
use App\Models\Order;
use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->customerDigital(),
            'service_category_id' => ServiceCategory::factory(),
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(150000, 15000000),
            'status' => fake()->randomElement(OrderStatus::cases()),
            'workspace_id' => null,
            'due_date' => fake()->optional()->dateTimeBetween('+1 week', '+3 months'),
        ];
    }
}
