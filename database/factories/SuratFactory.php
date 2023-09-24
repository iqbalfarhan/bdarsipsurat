<?php

namespace Database\Factories;

use App\Models\Subkategori;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surat>
 */
class SuratFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subkategori_id' => fake()->randomElement(Subkategori::pluck('id')),
            'unit_id' => fake()->randomElement(Unit::pluck('id')),
            'user_id' => fake()->randomElement(User::pluck('id')),
            'jenis' => fake()->randomElement(['masuk', 'keluar']),
            'perihal' => fake()->sentence(),
            'use_password' => fake()->boolean(),
            'password' => Hash::make('adminoke')
        ];
    }
}
