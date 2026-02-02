<!-- Keunggulan / Features -->
<section id="features" class="mx-auto max-w-6xl px-4 pt-12">
    <div
        class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-soft dark:border-slate-800 dark:bg-slate-900">
        <div class="text-center">
            <h2 class="text-2xl font-semibold tracking-tight">Keunggulan</h2>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Alasan kenapa pelanggan memilih kami untuk
                perjalanan mereka</p>
        </div>

        <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @php
                $features = [
                    ['icon' => '💰', 'title' => 'Tarif Terjangkau', 'desc' => 'Tarif yang terjangkau pelayanan memukau'],
                    ['icon' => '👨‍✈️', 'title' => 'Driver Professional', 'desc' => 'Driver ramah, disiplin, sehat, dan berpengalaman'],
                    ['icon' => '🚗', 'title' => 'Mobil Prima Terawat', 'desc' => 'Mobil nyaman, dicek rutin, terawat kondisi laik jalan'],
                    ['icon' => '🤝', 'title' => 'Fasilitas Nyaman', 'desc' => 'Full AC, Free charging, dan Bagasi yang cukup luas'],
                    ['icon' => '📍', 'title' => 'Sesuai Titik/Tempat', 'desc' => 'Dijemput dan diantar sampai tempat tujuan'],
                    ['icon' => '👍', 'title' => 'Pilihan Terbaik', 'desc' => 'Alhamdulillah telah dipercaya oleh banyak pelanggan'],
                    ['icon' => '📅', 'title' => 'Berangkat Setiap Hari', 'desc' => 'Berangkat setiap hari dari pagi, siang dan malam'],
                    ['icon' => '📱', 'title' => 'Booking Mudah', 'desc' => 'Booking mudah via whatsapp, atau telpon'],
                ];
            @endphp

            @foreach($features as $feature)
                <div class="group text-center">
                    <div
                        class="mx-auto grid h-20 w-20 place-items-center rounded-3xl border-2 border-slate-200 bg-gradient-to-br from-purple-50 to-fuchsia-50 text-4xl transition-all duration-300 group-hover:scale-110 group-hover:border-purple-300 group-hover:shadow-lg dark:border-slate-800 dark:from-purple-950/30 dark:to-fuchsia-950/30 dark:group-hover:border-purple-700">
                        {{ $feature['icon'] }}
                    </div>
                    <h3 class="mt-4 font-semibold text-slate-900 dark:text-white">{{ $feature['title'] }}</h3>
                    <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">{{ $feature['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>