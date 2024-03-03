<?php

namespace App\Http\Controllers;

use App\Models\ClassGrade;
use App\Models\CourseSchedule;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courseSchedules = CourseSchedule::all();
        $grades = ClassGrade::all();
        $mapels = MataPelajaran::all();
        return view('pages.dashboard', compact(['courseSchedules', 'grades', 'mapels']));
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
        $validatedData = $request->validate([
            'id_kelas' => 'required',
            'id_mapel' => 'required',
            "waktu_mulai" => "required",
            "waktu_selesai" => "required",
            "ruang" => "required",
            'keterangan' => 'nullable|string'
        ]);

        if (!$validatedData['keterangan'] == null) {
            $validatedData['keterangan'] = '';
        }

        $mapel = MataPelajaran::where('id', $request->input('id_mapel'));
        $validatedData['pelajaran'] = $mapel->value('mapel');

        $class = ClassGrade::where('id', $request->input('id_kelas'));
        $validatedData['kode_rombel'] = $class->value('tingkatan') . ' - MPL - ' . $mapel->value('kode_mapel');

        CourseSchedule::create($validatedData);

        return redirect('/dashboard')->with('success', 'Your book has been updated!');
        // return $validatedData;
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
        $validatedData = $request->validate([
            "waktu_mulai" => "required",
            "waktu_selesai" => "required",
            "ruang" => "required",
            'keterangan' => 'nullable|string'
        ]);

        if (!$validatedData['keterangan'] == null) {
            $validatedData['keterangan'] = '';
        }

        $mapel = MataPelajaran::where('id', $request->input('id_mapel'));
        $validatedData['pelajaran'] = $mapel->value('mapel');

        $class = ClassGrade::where('id', $request->input('id_kelas'));
        $validatedData['kode_rombel'] = $class->value('tingkatan') . ' - MPL - ' . $mapel->value('kode_mapel');

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
