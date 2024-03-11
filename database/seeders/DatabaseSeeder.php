<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ClassGrade;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\CourseSchedule;
use App\Models\Days;
use App\Models\MataPelajaran;
use App\Models\Teachers;
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

        CourseSchedule::factory(30)->create();

        for ($i = 0; $i < count($tingkatan); $i++) {
            for ($j = ord('A'); $j <= ord('J'); $j++) {
                ClassGrade::create([
                    'tingkatan' => $tingkatan[$i],
                    'kelas' => chr($j),
                ]);
            }
        }
        $mapel = collect([
            'IND' => 'Bahasa Indonesia',
            'ING' => 'Bahasa Inggris',
            'IPA' => 'IPA',
            'IPS' => 'IPS',
            'PJK' => 'Pendidikan Jasmani Olahraga dan Kesehatan',
            'MTK' => 'Matematika',
            'PAI' => 'Pendidikan Agama Islam',
        ]);
        $days = [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
        ];
        for ($k = 0; $k < count($mapel) - 1; $k++) {
            MataPelajaran::create([
                'kode_mapel' => $mapel->keys()[$k],
                'mapel' => $mapel->values()[$k],
            ]);
        }
        foreach ($days as $day) {
            Days::create([
                'hari' => $day,
            ]);
        }

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        for ($i = 0; $i < 10; $i++) {
            Teachers::create([
                'nama_guru' => fake('id_ID')->name()
            ]);
        }
    }
}
