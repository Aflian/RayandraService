<?php

namespace Database\Factories;

use App\Enums\RevisionStatus;
use App\Models\Order;
use App\Models\Revision;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Revision>
 */
class RevisionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'user_id' => User::factory(),
            'note' => fake()->paragraph(),
            'status' => fake()->randomElement(RevisionStatus::cases()),
            'resolved_at' => null,
        ];
    }
}
