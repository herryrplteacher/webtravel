@extends('frontend.layout')

@section('title', $route->from_location->name . ' - ' . $route->to_location->name)
@section('subtitle', $settings['site_name'] ?? 'D3 Travel')
@section('description', 'Informasi detail rute perjalanan dari ' . $route->from_location->name . ' ke ' . $route->to_location->name)

@section('content')
    <section class="mx-auto max-w-5xl px-4 pt-10 pb-14">
        <div
            class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-soft dark:border-slate-800 dark:bg-slate-900">
            <!-- Breadcrumb -->
            <div class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-300">
                <a href="{{ route('frontend.index') }}" class="hover:text-slate-900 dark:hover:text-white">Beranda</a>
                <span>→</span>
                <a href="{{ route('frontend.index') }}#routes" class="hover:text-slate-900 dark:hover:text-white">Rute</a>
                <span>→</span>
                <span class="font-semibold text-slate-900 dark:text-white">Detail</span>
            </div>

            <!-- Hero Image -->
            <div class="mt-6 overflow-hidden rounded-3xl">
                <img class="h-80 w-full object-cover"
                    src="{{ $route->cover_image ?? 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1400&q=80' }}"
                    alt="{{ $route->from_location->name }} - {{ $route->to_location->name }}" loading="lazy" />
            </div>

            <!-- Route Title & Info -->
            <div class="mt-6">
                <div
                    class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-semibold text-slate-700 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-200">
                    <span class="h-2 w-2 rounded-full bg-cyan-500"></span>
                    {{ $route->service->name ?? 'Door to Door' }}
                </div>

                <h1 class="mt-3 text-3xl font-semibold tracking-tight">
                    {{ $route->from_location->name }} ↔ {{ $route->to_location->name }}
                </h1>

                <div class="mt-6 grid gap-4 sm:grid-cols-3">
                    <div
                        class="rounded-3xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-800 dark:bg-slate-950">
                        <p class="text-xs text-slate-600 dark:text-slate-300">Durasi</p>
                        <p class="mt-1 text-xl font-semibold">{{ $route->duration ?? '± 4-6 jam' }}</p>
                    </div>
                    <div
                        class="rounded-3xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-800 dark:bg-slate-950">
                        <p class="text-xs text-slate-600 dark:text-slate-300">Harga mulai</p>
                        <p class="mt-1 text-xl font-semibold">Rp {{ number_format($route->price_from, 0, ',', '.') }}</p>
                    </div>
                    <div
                        class="rounded-3xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-800 dark:bg-slate-950">
                        <p class="text-xs text-slate-600 dark:text-slate-300">Jarak</p>
                        <p class="mt-1 text-xl font-semibold">{{ $route->distance ?? '~250' }} km</p>
                    </div>
                </div>
            </div>

            <!-- Facilities -->
            @if($route->facilities->count() > 0)
                <div class="mt-8">
                    <h2 class="text-lg font-semibold">Fasilitas</h2>
                    <div class="mt-4 flex flex-wrap gap-2">
                        @foreach($route->facilities as $facility)
                            <span
                                class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2 text-sm text-slate-700 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-200">
                                <span class="h-2 w-2 rounded-full bg-blue-500"></span>
                                {{ $facility->label }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Schedules -->
            @if($route->schedules->count() > 0)
                <div class="mt-8">
                    <h2 class="text-lg font-semibold">Jadwal Keberangkatan</h2>
                    <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Pilih slot waktu yang sesuai</p>

                    <div class="mt-4 grid gap-3 sm:grid-cols-2 md:grid-cols-4">
                        @php
                            $groupedSchedules = $route->schedules->groupBy(function ($schedule) {
                                $hour = (int) explode(':', $schedule->depart_time)[0];
                                if ($hour >= 5 && $hour < 12)
                                    return 'Pagi';
                                if ($hour >= 12 && $hour < 15)
                                    return 'Siang';
                                if ($hour >= 15 && $hour < 18)
                                    return 'Sore';
                                return 'Malam';
                            });
                        @endphp

                        @foreach(['Pagi', 'Siang', 'Sore', 'Malam'] as $period)
                            @if(isset($groupedSchedules[$period]))
                                    <div
                                        class="rounded-3xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-800 dark:bg-slate-950">
                                        <p class="text-xs font-semibold text-slate-600 dark:text-slate-300">{{ $period }}</p>
                                        <p class="mt-2 text-sm">
                                            {{ $groupedSchedules[$period]->pluck('depart_time')->map(function ($time) {
                                    return date('H:i', strtotime($time));
                                })->implode(' • ') }}
                                        </p>
                                    </div>
                            @endif
                        @endforeach
                    </div>

                    <div
                        class="mt-4 rounded-2xl border border-amber-200 bg-amber-50 p-4 dark:border-amber-900/30 dark:bg-amber-950/20">
                        <p class="text-sm text-amber-900 dark:text-amber-200">
                            💡 Jadwal bisa berubah sewaktu-waktu. Konfirmasi via WhatsApp untuk slot yang tersedia.
                        </p>
                    </div>
                </div>
            @endif

            <!-- Description -->
            @if($route->short_desc)
                <div class="mt-8">
                    <h2 class="text-lg font-semibold">Deskripsi</h2>
                    <div
                        class="mt-3 text-sm leading-relaxed text-slate-600 dark:text-slate-300 prose prose-sm dark:prose-invert max-w-none">
                        {!! nl2br(e($route->short_desc)) !!}
                    </div>
                </div>
            @endif

            <!-- Important Notes -->
            <div class="mt-8">
                <h2 class="text-lg font-semibold">Catatan Penting</h2>
                <ul class="mt-4 space-y-3">
                    <li class="flex gap-3 text-sm text-slate-600 dark:text-slate-300">
                        <span class="text-blue-600 dark:text-blue-400">✓</span>
                        <span>Harga dapat berubah tergantung lokasi jemput & antar (door-to-door).</span>
                    </li>
                    <li class="flex gap-3 text-sm text-slate-600 dark:text-slate-300">
                        <span class="text-blue-600 dark:text-blue-400">✓</span>
                        <span>Konfirmasi booking ditunggu minimal 3–6 jam sebelum keberangkatan.</span>
                    </li>
                    <li class="flex gap-3 text-sm text-slate-600 dark:text-slate-300">
                        <span class="text-blue-600 dark:text-blue-400">✓</span>
                        <span>Bagasi lebih (over size) bisa dikenakan biaya tambahan.</span>
                    </li>
                    <li class="flex gap-3 text-sm text-slate-600 dark:text-slate-300">
                        <span class="text-blue-600 dark:text-blue-400">✓</span>
                        <span>Untuk rombongan / charter khusus, silakan hubungi via WhatsApp.</span>
                    </li>
                </ul>
            </div>

            <!-- CTA Booking -->
            <div
                class="mt-8 rounded-3xl border border-slate-200 bg-gradient-to-br from-blue-50 to-cyan-50 p-6 dark:border-slate-800 dark:from-blue-950/30 dark:to-cyan-950/30">
                <h3 class="text-lg font-semibold">Booking Cepat</h3>
                <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Isi data & lanjut checkout</p>

                <div class="mt-4 flex flex-col gap-3 sm:flex-row">
                    <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6282298900309' }}?text={{ urlencode('Halo, saya ingin booking travel dari ' . $route->from_location->name . ' ke ' . $route->to_location->name . '. Mohon info detail dan ketersediaan.') }}"
                        target="_blank" rel="noreferrer"
                        class="inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-600 px-6 py-3 text-sm font-semibold text-white hover:from-blue-700 hover:to-cyan-700">
                        💬 Chat WhatsApp
                    </a>
                    <a href="{{ route('frontend.index') }}#routes"
                        class="inline-flex items-center justify-center gap-2 rounded-2xl border-2 border-blue-600 bg-white px-6 py-3 text-sm font-semibold text-blue-700 hover:bg-blue-50 dark:border-blue-500 dark:bg-slate-900 dark:text-blue-300 dark:hover:bg-slate-800">
                        ← Lihat Rute Lain
                    </a>
                </div>

                <p class="mt-3 text-xs text-slate-500 dark:text-slate-400">*Harga bisa berubah sesuai jarak & lokasi.</p>
            </div>
        </div>

        <!-- Suggested Routes -->
        @if($suggestedRoutes->count() > 0)
            <div class="mt-10">
                <h2 class="text-2xl font-semibold tracking-tight">Rute lainnya</h2>
                <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Eksplorasi pilihan rute lain yang mungkin cocok.</p>

                <div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($suggestedRoutes as $suggested)
                        <article
                            class="group overflow-hidden rounded-[1.5rem] border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-slate-800 dark:bg-slate-900">
                            <div class="relative">
                                <img src="{{ $suggested->cover_image ?? 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80' }}"
                                    alt="{{ $suggested->from_location->name }} - {{ $suggested->to_location->name }}" loading="lazy"
                                    class="h-40 w-full object-cover transition duration-300 group-hover:scale-[1.03]" />
                            </div>
                            <div class="p-4">
                                <h3 class="text-sm font-semibold">{{ $suggested->from_location->name }} ↔
                                    {{ $suggested->to_location->name }}</h3>
                                <p class="mt-1 text-xs text-slate-600 dark:text-slate-300">
                                    Mulai Rp {{ number_format($suggested->price_from, 0, ',', '.') }}
                                </p>
                                <a href="{{ route('frontend.route.detail', $suggested->id) }}"
                                    class="mt-3 inline-flex w-full items-center justify-center rounded-2xl border border-slate-200 bg-white px-3 py-2 text-xs font-semibold text-slate-800 hover:bg-slate-50 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:hover:bg-slate-800">
                                    Lihat Detail →
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
@endsection
