<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ClassGrade;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\CourseSchedule;
use App\Models\User;

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

        $tingkatan = ['VII', 'VIII', 'IX'];
        // $waktu_mulai = fake()->time();
        // CourseSchedule::create([
        //     'kode_rombel' => fake()->randomElement($tingkatan) + " - BIN - A",
        //     'pelajaran' => "Bahasa Indonesia - Guru B. ind",
        //     'waktu_mulai' => $waktu_mulai,
        //     'waktu_selesai' => "09:51",
        //     'ruang' => "A - 3.2",
        //     'keterangan' => "pelajaran selesai"
        // ]);
        CourseSchedule::factory(30)->create();

        for ($i = 0; $i < count($tingkatan); $i++) {
            for ($j = ord('A'); $j <= ord('J'); $j++) {
                ClassGrade::create([
                    'tingkatan' => $tingkatan[$i],
                    'kelas' => chr($j),
                ]);
            }
        }

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'remember_token' => Str::random(10),
        ]);
    }
}
