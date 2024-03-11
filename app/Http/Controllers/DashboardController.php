<?php

namespace App\Http\Controllers;

use App\Models\ClassGrade;
use App\Models\CourseSchedule;
use App\Models\Days;
use App\Models\MataPelajaran;
use App\Models\TeacherPicketSchedule;
use App\Models\Teachers;
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
        $picketSchedules = TeacherPicketSchedule::all();

        $grades = ClassGrade::all();
        $mapels = MataPelajaran::all();
        $days = Days::all();
        $teachers = Teachers::all();

        return view('pages.dashboard', compact(['courseSchedules', 'grades', 'mapels', 'days', 'teachers', 'picketSchedules']));
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseSchedule $courseSchedule)
    {
    }
}
