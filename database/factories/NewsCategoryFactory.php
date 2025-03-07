<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NewsCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'       => fake()->sentence(2, true),
            'parent_id'  => null,
            'depth'      => 0,
            'created_at' => 1,
            'lft'        => 0,
            'rgt'        => 1
        ];
    }
}
