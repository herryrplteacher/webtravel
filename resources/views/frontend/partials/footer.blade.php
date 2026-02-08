<footer class="mt-10 border-t border-slate-200 pt-8 text-sm text-slate-600 dark:border-slate-800 dark:text-slate-300">
    <div class="mx-auto flex max-w-6xl flex-col gap-4 px-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex items-center gap-2">
            <div
                class="grid h-10 w-10 place-items-center rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-600 text-white">
                <span class="text-sm font-bold">{{ substr($settings['site_name'] ?? 'D3', 0, 2) }}</span>
            </div>
            <div>
                <p class="font-semibold text-slate-900 dark:text-white">{{ $settings['site_name'] ?? 'D3 Travel' }}</p>
                <p class="text-xs text-slate-500 dark:text-slate-400">© <span id="year"></span> —
                    {{ $settings['footer_text'] ?? 'Modern UI demo' }}
                </p>
            </div>
        </div>
        <div class="flex flex-wrap gap-4">
            <a class="hover:text-slate-900 dark:hover:text-white" href="{{ route('frontend.index') }}#routes">Rute</a>
            <a class="hover:text-slate-900 dark:hover:text-white"
                href="{{ route('frontend.index') }}#services">Layanan</a>
            <a class="hover:text-slate-900 dark:hover:text-white"
                href="{{ route('frontend.index') }}#features">Keunggulan</a>
            <a class="hover:text-slate-900 dark:hover:text-white" href="{{ route('frontend.index') }}#about">Tentang</a>
            <a class="hover:text-slate-900 dark:hover:text-white"
                href="{{ route('frontend.index') }}#gallery">Galeri</a>
            <a class="hover:text-slate-900 dark:hover:text-white"
                href="https://wa.me/{{ $settings['wa_number'] ?? '6282298900309' }}" target="_blank"
                rel="noreferrer">WhatsApp</a>
        </div>
    </div>
</footer>
