<!-- Reviews / Testimonials -->
<section id="reviews" class="mx-auto max-w-6xl px-4 py-14">
    <div
        class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-soft dark:border-slate-800 dark:bg-slate-900">
        <h2 class="text-2xl font-semibold tracking-tight">Apa kata pelanggan?</h2>
        <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Testimoni singkat (style card modern).
        </p>

        <div class="mt-6 grid gap-4 md:grid-cols-3">
            @php
                $reviews = [
                    ['stars' => 5, 'text' => '"Perjalanan nyaman, supir enak diajak ngobrol."', 'name' => 'Asep Samsul'],
                    ['stars' => 5, 'text' => '"Mobil wangi bersih, perjalanan makin nyaman."', 'name' => 'Tita'],
                    ['stars' => 5, 'text' => '"Supir ramah, alhamdulillah selamat sampai tujuan."', 'name' => 'Samuel'],
                ];
            @endphp

            @foreach($reviews as $review)
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-800 dark:bg-slate-950">
                    <div class="text-amber-400">★★★★★</div>
                    <p class="mt-2 text-sm text-slate-700 dark:text-slate-200">{{ $review['text'] }}</p>
                    <p class="mt-3 text-xs font-semibold text-slate-600 dark:text-slate-300">{{ $review['name'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>