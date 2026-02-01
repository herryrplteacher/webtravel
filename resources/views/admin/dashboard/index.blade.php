@extends('admin.master')

@section('title')
    <title>Dashboard - Admin Panel</title>
@endsection

@section('content')
    <div class="page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <!-- Page Title -->
            <div class="grid grid-cols-1 mb-5">
                <div class="flex items-center justify-between">
                    <h4 class="mb-sm-0 text-lg font-semibold grow text-gray-800 dark:text-gray-100">Dashboard</h4>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-5">
                <!-- Total Users -->
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-grow">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Total Users</p>
                                <h4 class="mb-0 text-2xl font-bold text-gray-800 dark:text-gray-100">
                                    {{ $stats['total_users'] }}</h4>
                            </div>
                            <div class="flex-shrink-0 self-center">
                                <div
                                    class="inline-flex items-center justify-center w-12 h-12 text-white rounded-full bg-violet-500">
                                    <i class="mdi mdi-account-multiple text-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Routes -->
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-grow">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Total Routes</p>
                                <h4 class="mb-0 text-2xl font-bold text-gray-800 dark:text-gray-100">
                                    {{ $stats['total_routes'] }}</h4>
                            </div>
                            <div class="flex-shrink-0 self-center">
                                <div
                                    class="inline-flex items-center justify-center w-12 h-12 text-white rounded-full bg-sky-500">
                                    <i class="mdi mdi-map-marker-path text-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Posts -->
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-grow">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Total Posts</p>
                                <h4 class="mb-0 text-2xl font-bold text-gray-800 dark:text-gray-100">
                                    {{ $stats['total_posts'] }}</h4>
                            </div>
                            <div class="flex-shrink-0 self-center">
                                <div
                                    class="inline-flex items-center justify-center w-12 h-12 text-white rounded-full bg-green-500">
                                    <i class="mdi mdi-file-document text-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total WA Leads -->
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-grow">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">WhatsApp Leads</p>
                                <h4 class="mb-0 text-2xl font-bold text-gray-800 dark:text-gray-100">
                                    {{ $stats['total_wa_leads'] }}</h4>
                            </div>
                            <div class="flex-shrink-0 self-center">
                                <div
                                    class="inline-flex items-center justify-center w-12 h-12 text-white rounded-full bg-yellow-500">
                                    <i class="mdi mdi-whatsapp text-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Services -->
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-grow">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Total Services</p>
                                <h4 class="mb-0 text-2xl font-bold text-gray-800 dark:text-gray-100">
                                    {{ $stats['total_services'] }}</h4>
                            </div>
                            <div class="flex-shrink-0 self-center">
                                <div
                                    class="inline-flex items-center justify-center w-12 h-12 text-white rounded-full bg-red-500">
                                    <i class="mdi mdi-room-service text-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Locations -->
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-grow">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Total Locations</p>
                                <h4 class="mb-0 text-2xl font-bold text-gray-800 dark:text-gray-100">
                                    {{ $stats['total_locations'] }}</h4>
                            </div>
                            <div class="flex-shrink-0 self-center">
                                <div
                                    class="inline-flex items-center justify-center w-12 h-12 text-white rounded-full bg-purple-500">
                                    <i class="mdi mdi-map-marker text-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Pages -->
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-grow">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Total Pages</p>
                                <h4 class="mb-0 text-2xl font-bold text-gray-800 dark:text-gray-100">
                                    {{ $stats['total_pages'] }}</h4>
                            </div>
                            <div class="flex-shrink-0 self-center">
                                <div
                                    class="inline-flex items-center justify-center w-12 h-12 text-white rounded-full bg-pink-500">
                                    <i class="mdi mdi-file-multiple text-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Menus -->
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-grow">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Total Menus</p>
                                <h4 class="mb-0 text-2xl font-bold text-gray-800 dark:text-gray-100">
                                    {{ $stats['total_menus'] }}</h4>
                            </div>
                            <div class="flex-shrink-0 self-center">
                                <div
                                    class="inline-flex items-center justify-center w-12 h-12 text-white rounded-full bg-indigo-500">
                                    <i class="mdi mdi-menu text-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Data Tables -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">
                <!-- Recent Users -->
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div class="flex items-center mb-4">
                            <h5 class="flex-grow text-15 text-gray-800 dark:text-gray-100">Recent Users</h5>
                            <a href="{{ route('index.user') }}"
                                class="text-sm text-violet-500 hover:underline">View All <i
                                    class="mdi mdi-arrow-right"></i></a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="border-b border-gray-50 dark:border-zinc-600">
                                    <tr>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                            Name</th>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                            Email</th>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                            Role</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50 dark:divide-zinc-600">
                                    @forelse ($recent_users as $user)
                                        <tr>
                                            <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-100">
                                                {{ $user->name }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400">
                                                {{ $user->email }}</td>
                                            <td class="px-4 py-3 text-sm">
                                                <span
                                                    class="px-2 py-1 text-xs rounded bg-violet-50 text-violet-500 dark:bg-violet-500/20">
                                                    {{ ucfirst($user->role) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-4 py-3 text-sm text-center text-gray-500">No users
                                                found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Recent WA Leads -->
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div class="flex items-center mb-4">
                            <h5 class="flex-grow text-15 text-gray-800 dark:text-gray-100">Recent WhatsApp Leads</h5>
                            <a href="{{ route('index.wa_lead') }}"
                                class="text-sm text-violet-500 hover:underline">View All <i
                                    class="mdi mdi-arrow-right"></i></a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="border-b border-gray-50 dark:border-zinc-600">
                                    <tr>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                            Name</th>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                            Phone</th>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                            Date</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50 dark:divide-zinc-600">
                                    @forelse ($recent_wa_leads as $lead)
                                        <tr>
                                            <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-100">
                                                {{ $lead->name }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400">
                                                {{ $lead->phone }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400">
                                                {{ $lead->created_at->format('d M Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-4 py-3 text-sm text-center text-gray-500">No leads
                                                found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
