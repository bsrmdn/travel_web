<?php

namespace App\Http\Controllers;

use App\Models\CourseSchedule;
use App\Http\Requests\StoreCourseScheduleRequest;
use App\Http\Requests\UpdateCourseScheduleRequest;
use App\Models\FlightSchedule;

class CourseScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courseSchedules = CourseSchedule::all();
        return view('pages.home', compact('courseSchedules'));
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
    public function store(StoreCourseScheduleRequest $request)
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
    public function update(UpdateCourseScheduleRequest $request, CourseSchedule $courseSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseSchedule $courseSchedule)
    {
        //
    }
}
