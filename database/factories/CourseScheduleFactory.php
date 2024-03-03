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
        $kelas = fake()->numberBetween(1, 30);
        $abjad = [];
        for ($i = ord('A'); $i <= ord('J'); $i++) {
            array_push($abjad, chr($i));
        }
        $j = array_pop($abjad);
        array_unshift($abjad, $j);

        $mapel = collect([
            'IND' => 'Bahasa Indonesia',
            'ING' => 'Bahasa Inggris',
            'IPA' => 'IPA',
            'IPS' => 'IPS',
            'PJK' => 'Pendidikan Jasmani Olahraga dan Kesehatan',
            'MTK' => 'Matematika',
            'PAI' => 'Pendidikan Agama Islam',
        ]);

        $m = fake()->numberBetween(0, count($mapel) - 1);

        $waktu_mulai = fake()->time('H:i:s', '15:00:00');
        $waktu_selesai = '';

        do {
            $waktu_selesai = fake()->time();
        } while ($waktu_mulai > $waktu_selesai);
        return [
            'id_kelas' => $kelas,
            'id_mapel' => $m + 1,
            'kode_rombel' => (($kelas <= 10 ? 'VII' : $kelas <= 20) ? 'VIII' : 'IX') . " - " . $mapel->keys()[$m] . " - " . $abjad[$kelas % 10],
            'pelajaran' => $mapel->values()[$m],
            'waktu_mulai' => $waktu_mulai,
            'waktu_selesai' => $waktu_selesai,
            'ruang' => "A - 3.2",
            'keterangan' => "pelajaran selesai piket"
        ];
    }
}
