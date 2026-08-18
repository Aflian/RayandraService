<?php

namespace Database\Factories;

use App\Enums\OrderFileType;
use App\Models\Order;
use App\Models\OrderFile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrderFile>
 */
class OrderFileFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'user_id' => User::factory(),
            'path' => 'uploads/'.fake()->uuid().'.pdf',
            'original_name' => fake()->fileExtension().' document',
            'type' => fake()->randomElement(OrderFileType::cases()),
        ];
    }
}
