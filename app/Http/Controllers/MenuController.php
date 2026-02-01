<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::query()
            ->with('parent', 'children')
            ->rootMenus()
            ->get();

        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentMenus = Menu::query()
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();

        return view('admin.menus.create', compact('parentMenus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        Menu::create($request->validated());

        return redirect()->route('index.menu')
            ->with('success', 'Menu berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        $menu->load('parent', 'children');

        return view('admin.menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $parentMenus = Menu::query()
            ->where('id', '!=', $menu->id)
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();

        return view('admin.menus.edit', compact('menu', 'parentMenus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $menu->update($request->validated());

        return redirect()->route('index.menu')
            ->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        if ($menu->children()->exists()) {
            return redirect()->route('index.menu')
                ->with('error', 'Menu tidak bisa dihapus karena memiliki submenu.');
        }

        $menu->delete();

        return redirect()->route('index.menu')
            ->with('success', 'Menu berhasil dihapus.');
    }
}
