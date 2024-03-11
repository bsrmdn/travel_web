<?php

namespace App\Http\Controllers;

use App\Models\TeacherPicketSchedule;
use App\Models\Days;
use App\Models\Teachers;
use Illuminate\Http\Request;

class TeacherPicketScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'id_hari' => 'required',
            'id_guru' => 'required',
            "tugas" => "required",
        ]);

        $day = Days::where('id',  $request->input('id_hari'));
        $validatedData['hari'] = $day->value('hari');

        $teacher = Teachers::where('id',  $request->input('id_guru'));
        $validatedData['nama_guru'] = $teacher->value('nama_guru');

        // return $validatedData;
        TeacherPicketSchedule::create($validatedData);

        return redirect('/dashboard')->with('success', 'Jadwal Piket telah ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherPicketSchedule $teacherPicketSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeacherPicketSchedule $teacherPicketSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeacherPicketSchedule $teacherPicketSchedule)
    {
        $validatedData = $request->validate([
            'id_hari' => 'required',
            'id_guru' => 'required',
            "nama_guru" => "required",
            "hari" => "required",
            "tugas" => "required",
        ]);

        $day = Days::where('id',  $request->input('id_hari'));
        $validatedData['hari'] = $day->value('hari');

        $teacher = Teachers::where('id',  $request->input('id_guru'));
        $validatedData['nama_guru'] = $teacher->value('nama_guru');

        TeacherPicketSchedule::where('id', $teacherPicketSchedule->id)->update($validatedData);

        // return $validatedData;
        return redirect('/dashboard')->with('success', 'Jadwal Piket telah ditambah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherPicketSchedule $teacherPicketSchedule)
    {
        TeacherPicketSchedule::destroy($teacherPicketSchedule->id);

        return redirect('/dashboard')->with('success', 'Jadwal telah dihapus');
    }
}
