<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Route;
use App\Models\Service;
use App\Models\Setting;

class FrontendController extends Controller
{
    /**
     * Display the homepage
     */
    public function index()
    {
        // Get all active routes with their related data
        $routes = Route::with(['from_location', 'to_location', 'facilities', 'schedules'])
            ->where('is_active', true)
            ->latest()
            ->get();

        // Get all services
        $services = Service::where('is_active', true)->get();

        // Get settings untuk kontak info, dll
        $settings = Setting::pluck('value', 'key_name');

        // Get pages for about us, dll
        $aboutPage = Page::where('slug', 'tentang-kami')
            ->where('is_published', true)
            ->first();

        return view('frontend.index', compact('routes', 'services', 'settings', 'aboutPage'));
    }

    /**
     * Display route detail page
     */
    public function routeDetail($id)
    {
        $route = Route::with(['from_location', 'to_location', 'facilities', 'schedules'])
            ->where('is_active', true)
            ->findOrFail($id);

        // Get other suggested routes (exclude current)
        $suggestedRoutes = Route::with(['from_location', 'to_location'])
            ->where('is_active', true)
            ->where('id', '!=', $id)
            ->limit(3)
            ->get();

        // Get settings untuk kontak info
        $settings = Setting::pluck('value', 'key_name');

        return view('frontend.detail', compact('route', 'suggestedRoutes', 'settings'));
    }

    /**
     * Get WhatsApp link with pre-filled message
     */
    public function getWhatsAppLink($routeId = null, $service = null)
    {
        $waNumber = Setting::where('key_name', 'whatsapp_number')->value('value') ?? '6282298900309';

        if ($routeId) {
            $route = Route::with(['from_location', 'to_location'])->find($routeId);
            if ($route) {
                $message = "Halo, saya ingin booking travel dari {$route->from_location->name} ke {$route->to_location->name}. Mohon info detail dan ketersediaan.";
                return "https://wa.me/{$waNumber}?text=" . urlencode($message);
            }
        }

        if ($service) {
            $message = "Halo, saya ingin tanya tentang layanan {$service}. Mohon info lebih lanjut.";
            return "https://wa.me/{$waNumber}?text=" . urlencode($message);
        }

        return "https://wa.me/{$waNumber}";
    }
}
