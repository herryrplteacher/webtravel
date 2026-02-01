<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRouteScheduleRequest;
use App\Http\Requests\UpdateRouteScheduleRequest;
use App\Models\Route;
use App\Models\Route_Schedule;

class RouteScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Route_Schedule::with('route')
            ->latest()
            ->get();

        return view('admin.route_schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routes = Route::active()->get();

        return view('admin.route_schedules.create', compact('routes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRouteScheduleRequest $request)
    {
        $data = $request->validated();

        // Clear conditional fields based on schedule_type
        if ($data['schedule_type'] !== 'dow') {
            $data['day_of_week'] = null;
        }

        if ($data['schedule_type'] !== 'date') {
            $data['specific_date'] = null;
        }

        Route_Schedule::create($data);

        return redirect()->route('index.route_schedule')
            ->with('success', 'Jadwal rute berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Route_Schedule $routeSchedule)
    {
        $routeSchedule->load('route');

        return view('admin.route_schedules.show', compact('routeSchedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Route_Schedule $routeSchedule)
    {
        $routes = Route::active()->get();

        return view('admin.route_schedules.edit', compact('routeSchedule', 'routes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRouteScheduleRequest $request, Route_Schedule $routeSchedule)
    {
        $data = $request->validated();

        // Clear conditional fields based on schedule_type
        if ($data['schedule_type'] !== 'dow') {
            $data['day_of_week'] = null;
        }

        if ($data['schedule_type'] !== 'date') {
            $data['specific_date'] = null;
        }

        $routeSchedule->update($data);

        return redirect()->route('index.route_schedule')
            ->with('success', 'Jadwal rute berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route_Schedule $routeSchedule)
    {
        $routeSchedule->delete();

        return redirect()->route('index.route_schedule')
            ->with('success', 'Jadwal rute berhasil dihapus');
    }
}
