<!-- Routes -->
<section id="routes" class="mx-auto max-w-6xl px-4 pt-12">
    <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h2 class="text-2xl font-semibold tracking-tight">Rute unggulan</h2>
            <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">
                Pilih rute, buka detail, lalu lanjut checkout.
            </p>
        </div>
        <div class="text-sm text-slate-600 dark:text-slate-300">
            Menampilkan <span id="countLabel"
                class="font-semibold text-slate-900 dark:text-white">{{ $routes->count() }}</span> rute
        </div>
    </div>

    <div id="routesGrid" class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Dynamically injected by JavaScript in index.blade.php -->
    </div>
</section>