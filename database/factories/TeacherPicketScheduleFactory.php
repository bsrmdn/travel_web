<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeacherPicketSchedule>
 */
class TeacherPicketScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $hari = [
        //     'Senin',
        //     'Selasa',
        //     'Rabu',
        //     'Kamis',
        //     'Jumat',
        //     'Sabtu',
        // ];
        // $n = fake()->numberBetween(0, count($hari) - 1);

        return [
            // 'id_hari' => $n + 1,

        ];
    }
}
