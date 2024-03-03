<?php

namespace App\Http\Controllers;

use App\Models\ClassGrade;
use App\Models\CourseSchedule;
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
        return view('pages.dashboard', compact(['courseSchedules', 'grades']));
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
        //
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
        //
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
