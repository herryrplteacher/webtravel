<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::with('creator')->latest()->get();

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePageRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Page::generateSlug($validated['title']);
        $validated['created_by'] = Auth::id();
        $validated['meta'] = $this->buildMeta($request);

        // Remove non-column fields
        unset($validated['image_main'], $validated['image_second'], $validated['image_third']);
        unset($validated['stat_value'], $validated['stat_label'], $validated['visi_misi']);

        Page::create($validated);

        return redirect()->route('index.page')->with('success', 'Halaman berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        $page->load('creator');

        return view('admin.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $validated = $request->validated();
        $validated['slug'] = Page::generateSlug($validated['title']);
        $validated['meta'] = $this->buildMeta($request, $page);

        // Remove non-column fields
        unset($validated['image_main'], $validated['image_second'], $validated['image_third']);
        unset($validated['stat_value'], $validated['stat_label'], $validated['visi_misi']);

        $page->update($validated);

        return redirect()->route('index.page')->with('success', 'Halaman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        // Delete associated images from storage
        if ($page->meta) {
            foreach (['image_main', 'image_second', 'image_third'] as $imageKey) {
                if (! empty($page->meta[$imageKey])) {
                    Storage::disk('public')->delete($page->meta[$imageKey]);
                }
            }
        }

        $page->delete();

        return redirect()->route('index.page')->with('success', 'Halaman berhasil dihapus.');
    }

    /**
     * Build meta array from request data (stats, images, visi_misi).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>|null
     */
    private function buildMeta($request, ?Page $page = null): ?array
    {
        $existingMeta = $page?->meta ?? [];
        $meta = $existingMeta;

        // Handle stats
        $statValues = $request->input('stat_value', []);
        $statLabels = $request->input('stat_label', []);

        if (! empty($statValues) || ! empty($statLabels)) {
            $stats = [];
            foreach ($statValues as $i => $value) {
                if (! empty($value) && ! empty($statLabels[$i] ?? '')) {
                    $stats[] = [
                        'value' => $value,
                        'label' => $statLabels[$i],
                    ];
                }
            }
            $meta['stats'] = $stats;
        }

        // Handle visi_misi
        if ($request->has('visi_misi')) {
            $meta['visi_misi'] = $request->input('visi_misi');
        }

        // Handle image uploads
        foreach (['image_main', 'image_second', 'image_third'] as $imageKey) {
            if ($request->hasFile($imageKey)) {
                // Delete old image if exists
                if (! empty($existingMeta[$imageKey])) {
                    Storage::disk('public')->delete($existingMeta[$imageKey]);
                }
                $meta[$imageKey] = $request->file($imageKey)->store('pages', 'public');
            }
        }

        return ! empty($meta) ? $meta : null;
    }
}
