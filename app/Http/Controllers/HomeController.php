<?php

namespace App\Http\Controllers;

use App\Models\ClassGrade;
use App\Models\CourseSchedule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courseSchedules = CourseSchedule::all();
        $grades = ClassGrade::all();
        return view('pages.dashboard', compact(['courseSchedules', 'grades']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseSchedule $courseSchedule)
    {
        //
    }
}
