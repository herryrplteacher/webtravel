<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromotionRequest;
use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::orderBy('sort_order')->latest()->get();

        return view('admin.promotions.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromotionRequest $request)
    {
        $validated = $request->validated();
        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['created_by'] = Auth::id();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('promotions', 'public');
        }

        Promotion::create($validated);

        return redirect()->route('index.promotion')
            ->with('success', 'Promosi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        return view('admin.promotions.show', compact('promotion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        return view('admin.promotions.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PromotionRequest $request, Promotion $promotion)
    {
        $validated = $request->validated();
        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            if ($promotion->image) {
                Storage::disk('public')->delete($promotion->image);
            }
            $validated['image'] = $request->file('image')->store('promotions', 'public');
        }

        $promotion->update($validated);

        return redirect()->route('index.promotion')
            ->with('success', 'Promosi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        if ($promotion->image) {
            Storage::disk('public')->delete($promotion->image);
        }

        $promotion->delete();

        return redirect()->route('index.promotion')
            ->with('success', 'Promosi berhasil dihapus.');
    }

    /**
     * Toggle promotion active status
     */
    public function toggleStatus(Promotion $promotion)
    {
        $promotion->update([
            'is_active' => ! $promotion->is_active,
        ]);

        $status = $promotion->is_active ? 'diaktifkan' : 'dinonaktifkan';

        return redirect()->route('index.promotion')
            ->with('success', "Promosi berhasil {$status}.");
    }
}
