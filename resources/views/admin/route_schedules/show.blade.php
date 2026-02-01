@extends('admin.master')

@section('title')
    <title>Detail Jadwal Route</title>
@endsection

@section('content')
    <div class="min-h-screen page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 pb-6">
                <div class="md:flex items-center justify-between px-[2px]">
                    <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">
                        Detail Jadwal Route</h4>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                            <li class="inline-flex items-center">
                                <a href="{{ route('index.route_schedule') }}"
                                    class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                    Jadwal Route
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center rtl:mr-2">
                                    <i
                                        class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                    <span
                                        class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100">Detail
                                        Jadwal</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- content start -->
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-8">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                            <div class="flex justify-between items-center">
                                <h6 class="mb-0 text-gray-700 text-15 dark:text-gray-100 font-semibold">
                                    Informasi Jadwal Route
                                </h6>
                                <div class="flex gap-2">
                                    <a href="{{ route('edit.route_schedule', $routeSchedule->id) }}"
                                        class="btn bg-yellow-500 text-white hover:bg-yellow-600 px-4 py-2 rounded inline-flex items-center">
                                        <i class="fas fa-edit mr-2"></i> Edit
                                    </a>
                                    <a href="{{ route('index.route_schedule') }}"
                                        class="btn bg-gray-200 text-gray-700 hover:bg-gray-300 px-4 py-2 rounded dark:bg-zinc-600 dark:text-gray-100 dark:hover:bg-zinc-700">
                                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="space-y-4">
                                <div class="border-b border-gray-100 dark:border-zinc-600 pb-4">
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                        Route
                                    </label>
                                    <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                        {{ $routeSchedule->route?->title ?? '-' }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                        <i class="fas fa-route mr-2"></i>
                                        {{ $routeSchedule->route?->fromLocation?->name ?? '-' }} →
                                        {{ $routeSchedule->route?->toLocation?->name ?? '-' }}
                                    </p>
                                </div>

                                <div class="border-b border-gray-100 dark:border-zinc-600 pb-4">
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                        Tipe Jadwal
                                    </label>
                                    <p class="text-gray-800 dark:text-gray-100">
                                        <span
                                            class="px-3 py-1 text-sm bg-blue-100 text-blue-800 rounded dark:bg-blue-900 dark:text-blue-100">
                                            {{ $routeSchedule->getScheduleTypeLabel() }}
                                        </span>
                                    </p>
                                </div>

                                @if ($routeSchedule->schedule_type === 'dow')
                                    <div class="border-b border-gray-100 dark:border-zinc-600 pb-4">
                                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                            Hari
                                        </label>
                                        <p class="text-gray-800 dark:text-gray-100">
                                            <i class="far fa-calendar mr-2"></i>
                                            {{ $routeSchedule->getDayOfWeekLabel() }}
                                        </p>
                                    </div>
                                @endif

                                @if ($routeSchedule->schedule_type === 'date')
                                    <div class="border-b border-gray-100 dark:border-zinc-600 pb-4">
                                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                            Tanggal Spesifik
                                        </label>
                                        <p class="text-gray-800 dark:text-gray-100">
                                            <i class="far fa-calendar-alt mr-2"></i>
                                            {{ $routeSchedule->specific_date?->format('d F Y') ?? '-' }}
                                        </p>
                                    </div>
                                @endif

                                <div class="border-b border-gray-100 dark:border-zinc-600 pb-4">
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                        Waktu Keberangkatan
                                    </label>
                                    <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                        <i class="far fa-clock mr-2 text-yellow-600"></i>
                                        {{ date('H:i', strtotime($routeSchedule->depart_time)) }} WIB
                                    </p>
                                </div>

                                @if ($routeSchedule->note)
                                    <div class="border-b border-gray-100 dark:border-zinc-600 pb-4">
                                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                            Catatan
                                        </label>
                                        <p class="text-gray-800 dark:text-gray-100">
                                            <i class="fas fa-sticky-note mr-2"></i>
                                            {{ $routeSchedule->note }}
                                        </p>
                                    </div>
                                @endif

                                <div class="border-b border-gray-100 dark:border-zinc-600 pb-4">
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                        Status
                                    </label>
                                    <p class="text-gray-800 dark:text-gray-100">
                                        @if ($routeSchedule->is_active)
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

                                <div class="border-b border-gray-100 dark:border-zinc-600 pb-4">
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                        Dibuat Pada
                                    </label>
                                    <p class="text-gray-800 dark:text-gray-100">
                                        {{ $routeSchedule->created_at?->format('d F Y, H:i') ?? '-' }}
                                    </p>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                        Terakhir Diupdate
                                    </label>
                                    <p class="text-gray-800 dark:text-gray-100">
                                        {{ $routeSchedule->updated_at?->format('d F Y, H:i') ?? '-' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-4">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                            <h6 class="mb-0 text-gray-700 text-15 dark:text-gray-100 font-semibold">
                                Aksi
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="space-y-3">
                                <a href="{{ route('edit.route_schedule', $routeSchedule->id) }}"
                                    class="w-full btn bg-yellow-500 text-white hover:bg-yellow-600 px-4 py-2 rounded inline-flex items-center justify-center">
                                    <i class="fas fa-edit mr-2"></i> Edit Jadwal
                                </a>

                                <form action="{{ route('destroy.route_schedule', $routeSchedule->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full btn bg-red-500 text-white hover:bg-red-600 px-4 py-2 rounded inline-flex items-center justify-center">
                                        <i class="fas fa-trash mr-2"></i> Hapus Jadwal
                                    </button>
                                </form>

                                <a href="{{ route('index.route_schedule') }}"
                                    class="w-full btn bg-gray-200 text-gray-700 hover:bg-gray-300 px-4 py-2 rounded inline-flex items-center justify-center dark:bg-zinc-600 dark:text-gray-100 dark:hover:bg-zinc-700">
                                    <i class="fas fa-list mr-2"></i> Lihat Semua Jadwal
                                </a>
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
