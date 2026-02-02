<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use App\Models\Route;
use App\Models\Service;
use App\Models\User;
use App\Models\Wa_Leads;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_routes' => Route::count(),
            'total_posts' => Post::count(),
            'total_pages' => Page::count(),
            'total_services' => Service::count(),
            'total_locations' => Location::count(),
            'total_wa_leads' => Wa_Leads::count(),
            'total_menus' => Menu::count(),
        ];

        $recent_users = User::latest()->limit(5)->get();
        $recent_wa_leads = Wa_Leads::latest()->limit(5)->get();

        return view('admin.dashboard.index', compact('stats', 'recent_users', 'recent_wa_leads'));
    }
}
