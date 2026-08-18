<?php

namespace Database\Factories;

use App\Enums\PaymentStatus;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Payment>
 */
class PaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'method' => fake()->randomElement(['transfer_bca', 'transfer_bri', 'transfer_mandiri', 'ewallet']),
            'amount' => fake()->numberBetween(150000, 15000000),
            'proof_path' => null,
            'status' => fake()->randomElement(PaymentStatus::cases()),
            'notes' => fake()->optional()->sentence(),
            'verified_by' => null,
            'verified_at' => null,
        ];
    }
}
