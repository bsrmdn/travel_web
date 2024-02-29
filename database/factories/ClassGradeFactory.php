<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassGrade>
 */
class ClassGradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $kelas = [];
        // for ($i = ord('A'); $i <= ord('J'); $i++) {
        //     $kelas[] = chr($i);
        // }
        return [
            // 'tingkatan' => fake()->randomElement(['VII', 'VII', 'IX']),
            // 'kelas' => fake()->randomElement($kelas),
        ];
    }
}
