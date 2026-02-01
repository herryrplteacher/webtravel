<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

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

        $page->update($validated);

        return redirect()->route('index.page')->with('success', 'Halaman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('index.page')->with('success', 'Halaman berhasil dihapus.');
    }
}
