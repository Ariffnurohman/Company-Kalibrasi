<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_number'  => 'ORD-' . $this->faker->unique()->numberBetween(1000, 9999),
            'customer_name' => $this->faker->name(),
            'instrument'    => $this->faker->randomElement(['Micrometer', 'Caliper', 'Pressure Gauge']),
            'status'        => $this->faker->randomElement(['Pending', 'Completed', 'Processing']),
        ];
    }
}
