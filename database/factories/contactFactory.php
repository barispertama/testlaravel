<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\contact>
 */
class contactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = contact::class;

    public function definition(): array
    {
        return [
            'nama' => fake()->nama(),
            'email' => fake()->email(),
            'no_hp' => fake()->no_hp(),
            'created_at'=> fake()->created_at(),
        ];
    }
}
