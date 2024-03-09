<?php

namespace App\Http\Controllers;

use App\Models\ClassGrade;
use App\Models\CourseSchedule;
use App\Models\Days;
use App\Models\MataPelajaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Carbon::setLocale('id');
        $courseSchedules = CourseSchedule::all();
        $grades = ClassGrade::all();
        $mapels = MataPelajaran::all();
        $days = Days::all();

        return view('pages.dashboard', compact(['courseSchedules', 'grades', 'mapels', 'days']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'id_kelas' => 'required',
            'id_mapel' => 'required',
            'id_hari' => 'required',
            "waktu_mulai" => "required",
            "waktu_selesai" => "required",
            "ruang" => "required",
            'keterangan' => 'nullable|string'
        ]);

        if ($validatedData['keterangan'] == null) {
            $validatedData['keterangan'] = '';
        }

        $mapel = MataPelajaran::where('id', $request->input('id_mapel'));
        $validatedData['pelajaran'] = $mapel->value('mapel');

        $class = ClassGrade::where('id', $request->input('id_kelas'));
        $validatedData['kode_rombel'] = $class->value('tingkatan') . ' - ' . $mapel->value('kode_mapel') . ' - ' . $class->value('kelas');

        $day = Days::where('id',  $request->input('id_hari'));
        $validatedData['hari'] = $day->value('hari');

        CourseSchedule::create($validatedData);

        // return $validatedData;
        return redirect('/dashboard')->with('success', 'Your book has been updated!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseSchedule $courseSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseSchedule $courseSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseSchedule $courseSchedule)
    {
        // return $request;
        $validatedData = $request->validate([
            'id_kelas' => 'required',
            'id_mapel' => 'required',
            'id_hari' => 'required',
            // 'hari' => 'required',
            "waktu_mulai" => "required",
            "waktu_selesai" => "required",
            "ruang" => "required",
            'keterangan' => 'nullable|string'
        ]);

        if ($validatedData['keterangan'] == null) {
            $validatedData['keterangan'] = '';
        }

        $mapel = MataPelajaran::where('id', $request->input('id_mapel'));
        $validatedData['pelajaran'] = $mapel->value('mapel');

        $class = ClassGrade::where('id', $request->input('id_kelas'));
        $validatedData['kode_rombel'] = $class->value('tingkatan') . ' - ' . $mapel->value('kode_mapel') . ' - ' . $class->value('kelas');

        $day = Days::where('id',  $request->input('id_hari'));
        $validatedData['hari'] = $day->value('hari');

        CourseSchedule::where('id', $courseSchedule->id)->update($validatedData);

        return redirect('/dashboard')->with('success', 'Your book has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseSchedule $courseSchedule)
    {
        CourseSchedule::destroy($courseSchedule->id);

        return redirect('/dashboard')->with('success', 'Jadwal telah dihapus');
    }
}
