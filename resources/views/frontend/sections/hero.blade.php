<!-- Hero -->
<section class="mx-auto max-w-6xl px-4 pt-10">
    <div class="grid gap-6 lg:grid-cols-[1.15fr_0.85fr] lg:items-center">
        <div class="animate-fadeUp">
            <div
                class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white/70 px-3 py-1 text-xs font-medium text-slate-700 shadow-sm backdrop-blur dark:border-slate-800 dark:bg-slate-900/60 dark:text-slate-200">
                <span class="inline-block h-2 w-2 rounded-full bg-cyan-500"></span>
                Door-to-door • Armada nyaman • Driver profesional
            </div>

            <h1 class="mt-4 text-4xl font-semibold tracking-tight sm:text-5xl">
                Booking travel antar kota jadi
                <span
                    class="bg-gradient-to-r from-blue-700 via-sky-600 to-cyan-600 bg-clip-text text-transparent dark:from-blue-200 dark:via-sky-200 dark:to-cyan-200">
                    cepat & elegan
                </span>.
            </h1>

            <p class="mt-4 max-w-xl text-base leading-relaxed text-slate-600 dark:text-slate-300">
                Pilih rute, cek jadwal, lalu konfirmasi via WhatsApp., alur simpel, info rapi.
            </p>

            <!-- Search Card -->
            <div
                class="mt-6 rounded-3xl border border-slate-200 bg-white/80 p-4 shadow-soft backdrop-blur dark:border-slate-800 dark:bg-slate-900/60">
                <div class="grid gap-3 md:grid-cols-4">
                    <div class="md:col-span-2">
                        <label class="text-xs font-medium text-slate-600 dark:text-slate-300">Dari / Ke</label>
                        <div
                            class="mt-1 flex items-center gap-2 rounded-2xl border border-slate-200 bg-white px-3 py-2 dark:border-slate-800 dark:bg-slate-950">
                            <span class="text-slate-400">⌕</span>
                            <input id="qInput"
                                class="w-full bg-transparent text-sm outline-none placeholder:text-slate-400 dark:placeholder:text-slate-600"
                                placeholder="Contoh: Tasikmalaya, Jakarta, Bandara..." />
                        </div>
                    </div>

                    <div>
                        <label class="text-xs font-medium text-slate-600 dark:text-slate-300">Layanan</label>
                        <select id="svcSelect"
                            class="mt-1 w-full rounded-2xl border border-slate-200 bg-white px-3 py-2 text-sm text-slate-700 outline-none focus:ring-2 focus:ring-slate-900/10 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-200 dark:focus:ring-white/10">
                            <option value="All">Semua</option>
                            @foreach($services as $service)
                                <option value="{{ $service->name }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="text-xs font-medium text-slate-600  dark:text-slate-300">Tanggal</label>
                        <input id="dateInput" type="date"
                            class="mt-1 w-full rounded-2xl border border-slate-200 bg-white px-3 py-2 text-sm text-slate-700 outline-none focus:ring-2 focus:ring-slate-900/10 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-200 dark:focus:ring-white/10" />
                    </div>
                </div>

                <div class="mt-3 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div
                        class="flex items-center justify-between gap-3 rounded-2xl border border-slate-200 bg-white px-3 py-2 sm:w-[280px] dark:border-slate-800 dark:bg-slate-950">
                        <div>
                            <p class="text-xs font-medium text-slate-600 dark:text-slate-300">Jumlah penumpang</p>
                            <p class="text-sm font-semibold"><span id="travCount">2</span> orang</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button id="decBtn"
                                class="grid h-9 w-9 place-items-center rounded-2xl border border-slate-200 bg-white text-slate-700 hover:bg-slate-50 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800"
                                aria-label="decrease">−</button>
                            <button id="incBtn"
                                class="grid h-9 w-9 place-items-center rounded-2xl border border-slate-200 bg-white text-slate-700 hover:bg-slate-50 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800"
                                aria-label="increase">+</button>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2 sm:flex-row">
                        <button id="cekTarifBtn"
                            class="inline-flex items-center justify-center gap-2 rounded-2xl border-2 border-blue-600 bg-white px-4 py-3 text-sm font-semibold text-blue-700 shadow-sm hover:bg-blue-50 dark:border-blue-500 dark:bg-slate-900 dark:text-blue-300 dark:hover:bg-slate-800">
                            💬 Cek Tarif via WA
                        </button>
                        <a href="#routes"
                            class="inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-600 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:from-blue-700 hover:to-cyan-700">
                            Lihat rute tersedia <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-5 flex flex-wrap items-center gap-3 text-xs text-slate-600 dark:text-slate-300">
                <span
                    class="rounded-full border border-slate-200 bg-white/70 px-3 py-1 backdrop-blur dark:border-slate-800 dark:bg-slate-900/60">Full
                    AC</span>
                <span
                    class="rounded-full border border-slate-200 bg-white/70 px-3 py-1 backdrop-blur dark:border-slate-800 dark:bg-slate-900/60">Free
                    Charger</span>
                <span
                    class="rounded-full border border-slate-200 bg-white/70 px-3 py-1 backdrop-blur dark:border-slate-800 dark:bg-slate-900/60">Bagasi
                    Luas</span>
                <span
                    class="rounded-full border border-slate-200 bg-white/70 px-3 py-1 backdrop-blur dark:border-slate-800 dark:bg-slate-900/60">Berangkat
                    tiap hari</span>
            </div>
        </div>

        <!-- Hero Visual -->
        <div
            class="relative overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft dark:border-slate-800 dark:bg-slate-900 animate-fadeUp">
            <div
                class="absolute inset-0 bg-gradient-to-br from-slate-900/10 via-transparent to-indigo-500/10 dark:from-white/5 dark:to-sky-500/10">
            </div>
            <img class="h-[440px] w-full object-cover"
                src="{{ $settings['hero_image'] ?? 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1400&q=80' }}"
                alt="Travel" loading="lazy" />
            <div
                class="absolute bottom-4 left-4 right-4 rounded-3xl border border-white/30 bg-white/70 p-4 backdrop-blur dark:bg-slate-950/50 dark:border-slate-800/60">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <p class="text-xs font-medium text-slate-600 dark:text-slate-300">Highlight</p>
                        <p class="text-sm font-semibold">Door-to-door nyaman</p>
                        <p class="text-xs text-slate-600 dark:text-slate-300">Konfirmasi cepat via WhatsApp</p>
                    </div>
                    <a class="rounded-2xl bg-white px-3 py-2 text-sm font-semibold text-blue-700 shadow-sm hover:bg-slate-50 dark:bg-slate-900 dark:text-blue-300 dark:hover:bg-slate-800"
                        href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6282298900309' }}" target="_blank"
                        rel="noreferrer">
                        Chat
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
