<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::orderBy('sort_order')->latest()->get();

        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request)
    {
        $validated = $request->validated();
        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('galleries', 'public');
        }

        Gallery::create($validated);

        return redirect()->route('index.gallery')
            ->with('success', 'Gambar galeri berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request, Gallery $gallery)
    {
        $validated = $request->validated();
        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            $validated['image'] = $request->file('image')->store('galleries', 'public');
        }

        $gallery->update($validated);

        return redirect()->route('index.gallery')
            ->with('success', 'Gambar galeri berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('index.gallery')
            ->with('success', 'Gambar galeri berhasil dihapus.');
    }

    /**
     * Toggle gallery active status
     */
    public function toggleStatus(Gallery $gallery)
    {
        $gallery->update([
            'is_active' => ! $gallery->is_active,
        ]);

        $status = $gallery->is_active ? 'diaktifkan' : 'dinonaktifkan';

        return redirect()->route('index.gallery')
            ->with('success', "Gambar galeri berhasil {$status}.");
    }
}
