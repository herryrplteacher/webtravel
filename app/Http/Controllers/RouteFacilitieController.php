<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRouteFacilitieRequest;
use App\Http\Requests\UpdateRouteFacilitieRequest;
use App\Models\Route;
use App\Models\Route_facilitie;

class RouteFacilitieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = Route_facilitie::with('route')
            ->latest()
            ->get();

        return view('admin.route_facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routes = Route::active()->get();

        return view('admin.route_facilities.create', compact('routes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRouteFacilitieRequest $request)
    {
        Route_facilitie::create($request->validated());

        return redirect()->route('index.route_facilitie')
            ->with('success', 'Fasilitas route berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Route_facilitie $routeFacilitie)
    {
        $routeFacilitie->load('route');

        return view('admin.route_facilities.show', compact('routeFacilitie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Route_facilitie $routeFacilitie)
    {
        $routes = Route::active()->get();

        return view('admin.route_facilities.edit', compact('routeFacilitie', 'routes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRouteFacilitieRequest $request, Route_facilitie $routeFacilitie)
    {
        $routeFacilitie->update($request->validated());

        return redirect()->route('index.route_facilitie')
            ->with('success', 'Fasilitas route berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route_facilitie $routeFacilitie)
    {
        $routeFacilitie->delete();

        return redirect()->route('index.route_facilitie')
            ->with('success', 'Fasilitas route berhasil dihapus');
    }
}
