<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// prefix ke folder admin
Route::prefix('admin')->middleware(['auth', 'role'])->group(function () {
    // middleware untuk proteksi halaman admin

    // User routes
    Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->name('index.user');
    Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->name('create.user');
    Route::post('user', [App\Http\Controllers\UserController::class, 'store'])->name('store.user');
    Route::get('user/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('show.user')->where('user', '[0-9]+');
    Route::get('user/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('edit.user')->where('user', '[0-9]+');
    Route::put('user/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('update.user')->where('user', '[0-9]+');
    Route::delete('user/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroy.user')->where('user', '[0-9]+');

    // Menu routes
    Route::get('menu', [App\Http\Controllers\MenuController::class, 'index'])->name('index.menu');
    Route::get('menu/create', [App\Http\Controllers\MenuController::class, 'create'])->name('create.menu');
    Route::post('menu', [App\Http\Controllers\MenuController::class, 'store'])->name('store.menu');
    Route::get('menu/{menu}', [App\Http\Controllers\MenuController::class, 'show'])->name('show.menu')->where('menu', '[0-9]+');
    Route::get('menu/{menu}/edit', [App\Http\Controllers\MenuController::class, 'edit'])->name('edit.menu')->where('menu', '[0-9]+');
    Route::put('menu/{menu}', [App\Http\Controllers\MenuController::class, 'update'])->name('update.menu')->where('menu', '[0-9]+');
    Route::delete('menu/{menu}', [App\Http\Controllers\MenuController::class, 'destroy'])->name('destroy.menu')->where('menu', '[0-9]+');

    // Setting routes
    Route::get('setting', [App\Http\Controllers\SettingController::class, 'index'])->name('index.setting');
    Route::get('setting/create', [App\Http\Controllers\SettingController::class, 'create'])->name('create.setting');
    Route::post('setting', [App\Http\Controllers\SettingController::class, 'store'])->name('store.setting');
    Route::get('setting/{setting}', [App\Http\Controllers\SettingController::class, 'show'])->name('show.setting')->where('setting', '[0-9]+');
    Route::get('setting/{setting}/edit', [App\Http\Controllers\SettingController::class, 'edit'])->name('edit.setting')->where('setting', '[0-9]+');
    Route::put('setting/{setting}', [App\Http\Controllers\SettingController::class, 'update'])->name('update.setting')->where('setting', '[0-9]+');
    Route::delete('setting/{setting}', [App\Http\Controllers\SettingController::class, 'destroy'])->name('destroy.setting')->where('setting', '[0-9]+');

    // Page routes
    Route::get('page', [App\Http\Controllers\PageController::class, 'index'])->name('index.page');
    Route::get('page/create', [App\Http\Controllers\PageController::class, 'create'])->name('create.page');
    Route::post('page', [App\Http\Controllers\PageController::class, 'store'])->name('store.page');
    Route::get('page/{page}', [App\Http\Controllers\PageController::class, 'show'])->name('show.page')->where('page', '[0-9]+');
    Route::get('page/{page}/edit', [App\Http\Controllers\PageController::class, 'edit'])->name('edit.page')->where('page', '[0-9]+');
    Route::put('page/{page}', [App\Http\Controllers\PageController::class, 'update'])->name('update.page')->where('page', '[0-9]+');
    Route::delete('page/{page}', [App\Http\Controllers\PageController::class, 'destroy'])->name('destroy.page')->where('page', '[0-9]+');

    // Post routes
    Route::get('post', [App\Http\Controllers\PostController::class, 'index'])->name('index.post');
    Route::get('post/create', [App\Http\Controllers\PostController::class, 'create'])->name('create.post');
    Route::post('post', [App\Http\Controllers\PostController::class, 'store'])->name('store.post');
    Route::get('post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('show.post')->where('post', '[0-9]+');
    Route::get('post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('edit.post')->where('post', '[0-9]+');
    Route::put('post/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('update.post')->where('post', '[0-9]+');
    Route::delete('post/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('destroy.post')->where('post', '[0-9]+');

    // Route routes (Travel Routes)
    Route::get('route', [App\Http\Controllers\RouteController::class, 'index'])->name('index.route');
    Route::get('route/create', [App\Http\Controllers\RouteController::class, 'create'])->name('create.route');
    Route::post('route', [App\Http\Controllers\RouteController::class, 'store'])->name('store.route');
    Route::get('route/{route}', [App\Http\Controllers\RouteController::class, 'show'])->name('show.route')->where('route', '[0-9]+');
    Route::get('route/{route}/edit', [App\Http\Controllers\RouteController::class, 'edit'])->name('edit.route')->where('route', '[0-9]+');
    Route::put('route/{route}', [App\Http\Controllers\RouteController::class, 'update'])->name('update.route')->where('route', '[0-9]+');
    Route::delete('route/{route}', [App\Http\Controllers\RouteController::class, 'destroy'])->name('destroy.route')->where('route', '[0-9]+');

    // Service routes
    Route::get('service', [App\Http\Controllers\ServiceController::class, 'index'])->name('index.service');
    Route::get('service/create', [App\Http\Controllers\ServiceController::class, 'create'])->name('create.service');
    Route::post('service', [App\Http\Controllers\ServiceController::class, 'store'])->name('store.service');
    Route::get('service/{service}/edit', [App\Http\Controllers\ServiceController::class, 'edit'])->name('edit.service');
    Route::put('service/{service}', [App\Http\Controllers\ServiceController::class, 'update'])->name('update.service');
    Route::delete('service/{service}', [App\Http\Controllers\ServiceController::class, 'destroy'])->name('destroy.service');

    // Location routes
    Route::get('location', [App\Http\Controllers\LocationController::class, 'index'])->name('index.location');
    Route::get('location/create', [App\Http\Controllers\LocationController::class, 'create'])->name('create.location');
    Route::post('location', [App\Http\Controllers\LocationController::class, 'store'])->name('store.location');
    Route::get('location/{location}/edit', [App\Http\Controllers\LocationController::class, 'edit'])->name('edit.location');
    Route::put('location/{location}', [App\Http\Controllers\LocationController::class, 'update'])->name('update.location');
    Route::delete('location/{location}', [App\Http\Controllers\LocationController::class, 'destroy'])->name('destroy.location');

    // Route Schedule routes
    Route::get('route-schedule', [App\Http\Controllers\RouteScheduleController::class, 'index'])->name('index.route_schedule');
    Route::get('route-schedule/create', [App\Http\Controllers\RouteScheduleController::class, 'create'])->name('create.route_schedule');
    Route::post('route-schedule', [App\Http\Controllers\RouteScheduleController::class, 'store'])->name('store.route_schedule');
    Route::get('route-schedule/{routeSchedule}', [App\Http\Controllers\RouteScheduleController::class, 'show'])->name('show.route_schedule')->where('routeSchedule', '[0-9]+');
    Route::get('route-schedule/{routeSchedule}/edit', [App\Http\Controllers\RouteScheduleController::class, 'edit'])->name('edit.route_schedule')->where('routeSchedule', '[0-9]+');
    Route::put('route-schedule/{routeSchedule}', [App\Http\Controllers\RouteScheduleController::class, 'update'])->name('update.route_schedule')->where('routeSchedule', '[0-9]+');
    Route::delete('route-schedule/{routeSchedule}', [App\Http\Controllers\RouteScheduleController::class, 'destroy'])->name('destroy.route_schedule')->where('routeSchedule', '[0-9]+');

    // Route Facilitie routes
    Route::get('route-facilitie', [App\Http\Controllers\RouteFacilitieController::class, 'index'])->name('index.route_facilitie');
    Route::get('route-facilitie/create', [App\Http\Controllers\RouteFacilitieController::class, 'create'])->name('create.route_facilitie');
    Route::post('route-facilitie', [App\Http\Controllers\RouteFacilitieController::class, 'store'])->name('store.route_facilitie');
    Route::get('route-facilitie/{routeFacilitie}/edit', [App\Http\Controllers\RouteFacilitieController::class, 'edit'])->name('edit.route_facilitie');
    Route::put('route-facilitie/{routeFacilitie}', [App\Http\Controllers\RouteFacilitieController::class, 'update'])->name('update.route_facilitie');
    Route::delete('route-facilitie/{routeFacilitie}', [App\Http\Controllers\RouteFacilitieController::class, 'destroy'])->name('destroy.route_facilitie');

    // WhatsApp Leads routes
    Route::get('wa-lead', [App\Http\Controllers\WaLeadsController::class, 'index'])->name('index.wa_lead');
    Route::get('wa-lead/create', [App\Http\Controllers\WaLeadsController::class, 'create'])->name('create.wa_lead');
    Route::post('wa-lead', [App\Http\Controllers\WaLeadsController::class, 'store'])->name('store.wa_lead');
    Route::get('wa-lead/{waLead}', [App\Http\Controllers\WaLeadsController::class, 'show'])->name('show.wa_lead')->where('waLead', '[0-9]+');
    Route::delete('wa-lead/{waLead}', [App\Http\Controllers\WaLeadsController::class, 'destroy'])->name('destroy.wa_lead')->where('waLead', '[0-9]+');

}); // Tutup prefix group
