<?php

namespace App\Http\Controllers;

use App\Models\FlightSchedule;
use App\Http\Requests\StoreFlightScheduleRequest;
use App\Http\Requests\UpdateFlightScheduleRequest;

class FlightScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flightSchedules = FlightSchedule::all();
        // return view('pages.home', compact('flightSchedules'));
        return response()->json($flightSchedules);
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
    public function store(StoreFlightScheduleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FlightSchedule $flightSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FlightSchedule $flightSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFlightScheduleRequest $request, FlightSchedule $flightSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FlightSchedule $flightSchedule)
    {
        //
    }
}
