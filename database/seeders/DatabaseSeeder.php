<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CourseSchedule;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        CourseSchedule::create([
            'kode_rombel' => "XI - BIN - A",
            'pelajaran' => "Bahasa Indonesia - Guru B. ind",
            'waktu_mulai' => "07:40",
            'waktu_selesai' => "10.40",
            'ruang' => "A - 3.2",
            'keterangan' => "pelajaran selesai"
        ]);
        CourseSchedule::factory(5)->create();
    }
}
