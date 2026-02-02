<!-- Services -->
<section id="services" class="mx-auto max-w-6xl px-4 pt-12">
    <div
        class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-soft dark:border-slate-800 dark:bg-slate-900">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h2 class="text-2xl font-semibold tracking-tight">Layanan</h2>
                <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Satu tempat untuk kebutuhan perjalanan
                    kamu.</p>
            </div>
            <a class="rounded-2xl bg-gradient-to-r from-purple-600 to-fuchsia-600 px-4 py-2 text-sm font-semibold text-white hover:from-purple-700 hover:to-fuchsia-700"
                href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6282298900309' }}" target="_blank"
                rel="noreferrer">
                Booking via WhatsApp
            </a>
        </div>

        <div class="mt-6 grid gap-4 md:grid-cols-4">
            @foreach($services as $service)
                <div data-service="{{ $service->name }}"
                    class="service-card cursor-pointer rounded-3xl border border-slate-200 bg-slate-50 p-4 transition-all hover:scale-105 hover:border-purple-300 hover:shadow-lg dark:border-slate-800 dark:bg-slate-950 dark:hover:border-purple-700">
                    <p class="text-xs font-semibold text-slate-600 dark:text-slate-300">{{ $service->name }}</p>
                    <p class="mt-2 text-base font-semibold">{{ $service->title ?? $service->name }}</p>
                    <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">{{ Str::limit($service->description, 60) }}
                    </p>
                    <p class="mt-3 text-xs font-semibold text-purple-600 dark:text-purple-400">Klik untuk cek tarif →
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>