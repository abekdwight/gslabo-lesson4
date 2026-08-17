<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->value('id'),
            'type' => 'expense',
            'amount' => fake()->numberBetween(500, 20000),
            'occurred_at' => fake()->dateTimeBetween('-60 days', 'now')->format('Y-m-d'),
            'note' => null,
        ];
    }
}
