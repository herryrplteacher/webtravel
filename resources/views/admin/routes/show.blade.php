@extends('admin.master')

@section('title')
    <title>Detail Route</title>
@endsection

@section('content')
    <div class="min-h-screen page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 pb-6">
                <div class="md:flex items-center justify-between px-[2px]">
                    <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">
                        Detail Route</h4>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                            <li class="inline-flex items-center">
                                <a href="{{ route('index.route') }}"
                                    class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                    Route
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center rtl:mr-2">
                                    <i
                                        class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                    <span
                                        class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100">Detail
                                        Route</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- content start -->
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                            <div class="flex justify-between items-center">
                                <h6 class="mb-0 text-gray-700 text-15 dark:text-gray-100 font-semibold">
                                    Detail Informasi Route
                                </h6>
                                <div class="flex gap-2">
                                    <a href="{{ route('edit.route', $route->id) }}"
                                        class="btn bg-yellow-500 text-white hover:bg-yellow-600 focus:ring focus:ring-yellow-500/30 px-4 py-2 rounded inline-flex items-center">
                                        <i class="fas fa-edit mr-2"></i> Edit
                                    </a>
                                    <a href="{{ route('index.route') }}"
                                        class="btn bg-gray-200 text-gray-700 hover:bg-gray-300 focus:ring focus:ring-gray-300/30 px-4 py-2 rounded dark:bg-zinc-600 dark:text-gray-100 dark:hover:bg-zinc-700">
                                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($route->cover_image)
                                <div class="mb-6">
                                    <img src="{{ asset('storage/' . $route->cover_image) }}" alt="{{ $route->title }}"
                                        class="w-full max-w-2xl h-80 object-cover rounded-lg">
                                </div>
                            @endif

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Service</label>
                                    <p class="text-gray-900 dark:text-zinc-100 mb-4">
                                        <span
                                            class="px-3 py-1 bg-blue-100 text-blue-800 rounded dark:bg-blue-900 dark:text-blue-100">
                                            {{ $route->service?->name ?? '-' }}
                                        </span>
                                    </p>
                                </div>

                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                    <p class="text-gray-900 dark:text-zinc-100 mb-4">
                                        @if ($route->is_active)
                                            <span
                                                class="px-3 py-1 text-sm font-semibold text-green-800 bg-green-100 rounded dark:bg-green-900 dark:text-green-100">
                                                <i data-feather="check-circle" class="inline h-4 w-4 mr-1"></i>Aktif
                                            </span>
                                        @else
                                            <span
                                                class="px-3 py-1 text-sm font-semibold text-gray-800 bg-gray-100 rounded dark:bg-gray-600 dark:text-gray-100">
                                                <i data-feather="x-circle" class="inline h-4 w-4 mr-1"></i>Nonaktif
                                            </span>
                                        @endif
                                    </p>
                                </div>

                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Judul
                                        Route</label>
                                    <p class="text-gray-900 dark:text-zinc-100 mb-4 text-lg font-semibold">
                                        {{ $route->title }}</p>
                                </div>

                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Slug</label>
                                    <p class="text-gray-900 dark:text-zinc-100 mb-4">
                                        <code
                                            class="px-2 py-1 bg-gray-100 dark:bg-zinc-700 rounded">{{ $route->slug }}</code>
                                    </p>
                                </div>

                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Lokasi
                                        Asal</label>
                                    <p class="text-gray-900 dark:text-zinc-100 mb-4">
                                        <i data-feather="map-pin" class="inline h-4 w-4 mr-1 text-violet-600"></i>
                                        {{ $route->fromLocation?->name ?? '-' }}
                                        @if ($route->fromLocation)
                                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                                ({{ $route->fromLocation->getTypeLabel() }})
                                            </span>
                                        @endif
                                    </p>
                                </div>

                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Lokasi
                                        Tujuan</label>
                                    <p class="text-gray-900 dark:text-zinc-100 mb-4">
                                        <i data-feather="map-pin" class="inline h-4 w-4 mr-1 text-red-600"></i>
                                        {{ $route->toLocation?->name ?? '-' }}
                                        @if ($route->toLocation)
                                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                                ({{ $route->toLocation->getTypeLabel() }})
                                            </span>
                                        @endif
                                    </p>
                                </div>

                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Harga
                                        Mulai Dari</label>
                                    <p class="text-gray-900 dark:text-zinc-100 mb-4 text-xl font-bold text-violet-600">
                                        Rp {{ number_format($route->price_from, 0, ',', '.') }}
                                    </p>
                                </div>

                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Durasi
                                        Perjalanan</label>
                                    <p class="text-gray-900 dark:text-zinc-100 mb-4">
                                        <i data-feather="clock" class="inline h-4 w-4 mr-1"></i>
                                        {{ $route->duration ?? '-' }}
                                    </p>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi
                                    Singkat</label>
                                <div class="text-gray-900 dark:text-zinc-100 p-4 bg-gray-50 dark:bg-zinc-700/50 rounded">
                                    {{ $route->short_desc ?? '-' }}
                                </div>
                            </div>

                            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-zinc-600">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-500 dark:text-gray-400">
                                    <div>
                                        <strong>Dibuat pada:</strong> {{ $route->created_at->format('d M Y H:i') }}
                                    </div>
                                    <div>
                                        <strong>Terakhir diupdate:</strong> {{ $route->updated_at->format('d M Y H:i') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content end -->

            <!-- Footer Start -->
            @include('admin.components.footer')
            <!-- end Footer -->
        </div>
    </div>
@endsection
