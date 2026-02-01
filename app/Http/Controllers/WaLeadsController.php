<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWaLeadRequest;
use App\Models\Route;
use App\Models\Wa_Leads;

class WaLeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Wa_Leads::with('route')
            ->latest('clicked_at')
            ->get();

        return view('admin.wa_leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routes = Route::active()->get();

        return view('admin.wa_leads.create', compact('routes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWaLeadRequest $request)
    {
        $data = $request->validated();

        // Set clicked_at to now if not provided
        if (! isset($data['clicked_at'])) {
            $data['clicked_at'] = now();
        }

        Wa_Leads::create($data);

        return redirect()->route('index.wa_lead')
            ->with('success', 'Lead WhatsApp berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wa_Leads $waLead)
    {
        $waLead->load('route');

        return view('admin.wa_leads.show', compact('waLead'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wa_Leads $waLead)
    {
        $waLead->delete();

        return redirect()->route('index.wa_lead')
            ->with('success', 'Lead WhatsApp berhasil dihapus');
    }
}
