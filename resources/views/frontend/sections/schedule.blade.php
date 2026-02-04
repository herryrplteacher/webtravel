<!-- Schedule -->
<section id="schedule" class="mx-auto max-w-6xl px-4 pt-12">
    <div class="grid gap-6 lg:grid-cols-2">
        <div
            class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-soft dark:border-slate-800 dark:bg-slate-900">
            <h2 class="text-2xl font-semibold tracking-tight">Jam keberangkatan</h2>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Contoh slot: pagi, siang, sore, malam.
            </p>

            <div class="mt-6 grid gap-4 sm:grid-cols-2">
                @php
                    $schedules = [
                        ['time' => 'Pagi', 'slots' => '08:00 • 10:00'],
                        ['time' => 'Siang', 'slots' => '12:30 • 14:00'],
                        ['time' => 'Sore', 'slots' => '15:30 • 16:40'],
                        ['time' => 'Malam', 'slots' => '18:30 • 20:30 • 22:00'],
                    ];
                @endphp

                @foreach($schedules as $schedule)
                    <div
                        class="rounded-3xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-800 dark:bg-slate-950">
                        <p class="text-xs font-semibold text-slate-600 dark:text-slate-300">{{ $schedule['time'] }}</p>
                        <p class="mt-2 text-sm">{{ $schedule['slots'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div
            class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-soft dark:border-slate-800 dark:bg-slate-900">
            <h3 class="text-lg font-semibold">Kenapa pilih kami?</h3>
            <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">
                Driver ramah, armada terawat, fasilitas lengkap.
            </p>

            <div class="mt-5 grid gap-4 sm:grid-cols-2">
                @php
                    $highlights = [
                        ['label' => 'Fasilitas', 'value' => 'AC • Charger'],
                        ['label' => 'Bagasi', 'value' => 'Luas'],
                        ['label' => 'Keberangkatan', 'value' => 'Setiap hari'],
                        ['label' => 'Booking', 'value' => 'Via WA'],
                    ];
                @endphp

                @foreach($highlights as $highlight)
                    <div
                        class="rounded-3xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-800 dark:bg-slate-950">
                        <p class="text-xs text-slate-600 dark:text-slate-300">{{ $highlight['label'] }}</p>
                        <p class="mt-2 text-2xl font-semibold">{{ $highlight['value'] }}</p>
                    </div>
                @endforeach
            </div>

            <div
                class="mt-6 rounded-3xl border border-slate-200 bg-gradient-to-br from-blue-700 to-cyan-700 p-5 text-white dark:border-slate-800">
                <p class="text-sm font-semibold">Butuh konfirmasi cepat?</p>
                <p class="mt-1 text-sm text-white/80">Klik tombol WhatsApp, kirim rute + tanggal + jumlah orang.</p>
                <div class="mt-4 flex flex-col gap-2 sm:flex-row">
                    <a class="rounded-2xl bg-white px-4 py-2 text-sm font-semibold text-blue-700 hover:bg-slate-50"
                        href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6282298900309' }}" target="_blank"
                        rel="noreferrer">Chat WhatsApp</a>
                    <a class="rounded-2xl border border-white/30 bg-white/10 px-4 py-2 text-sm font-semibold text-white hover:bg-white/15"
                        href="#routes">Lihat rute</a>
                </div>
            </div>
        </div>
    </div>
</section>
