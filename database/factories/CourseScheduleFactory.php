<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseSchedule>
 */
class CourseScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_rombel' => "XI - BIN - A",
            'pelajaran' => "Bahasa Indonesia - Guru B. ind",
            'waktu_mulai' => "7.40",
            'waktu_selesai' => "10.40",
            'ruang' => "A - 3.2",
            'keterangan' => "pelajaran selesai piket"
        ];
    }
}
