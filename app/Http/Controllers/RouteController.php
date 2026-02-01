<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRouteRequest;
use App\Http\Requests\UpdateRouteRequest;
use App\Models\Location;
use App\Models\Route;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = Route::with(['service', 'fromLocation', 'toLocation'])
            ->latest()
            ->get();

        return view('admin.routes.index', compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::active()->get();
        $locations = Location::active()->get();

        return view('admin.routes.create', compact('services', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRouteRequest $request)
    {
        $data = $request->validated();

        // Generate slug
        $data['slug'] = Route::generateSlug($data['title']);

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('routes', 'public');
        }

        Route::create($data);

        return redirect()->route('index.route')
            ->with('success', 'Rute berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Route $route)
    {
        $route->load(['service', 'fromLocation', 'toLocation']);

        return view('admin.routes.show', compact('route'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Route $route)
    {
        $services = Service::active()->get();
        $locations = Location::active()->get();

        return view('admin.routes.edit', compact('route', 'services', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRouteRequest $request, Route $route)
    {
        $data = $request->validated();

        // Update slug if title changed
        if ($request->title !== $route->title) {
            $data['slug'] = Route::generateSlug($data['title']);
        }

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            // Delete old image
            if ($route->cover_image) {
                Storage::disk('public')->delete($route->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('routes', 'public');
        }

        $route->update($data);

        return redirect()->route('index.route')
            ->with('success', 'Rute berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route)
    {
        // Delete cover image if exists
        if ($route->cover_image) {
            Storage::disk('public')->delete($route->cover_image);
        }

        $route->delete();

        return redirect()->route('index.route')
            ->with('success', 'Rute berhasil dihapus');
    }
}
