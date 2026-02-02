<div class="border-b border-slate-200/70 bg-white/70 backdrop-blur dark:border-slate-800/70 dark:bg-slate-900/50">
    <div
        class="mx-auto flex max-w-6xl items-center justify-between px-4 py-2 text-xs text-slate-600 dark:text-slate-300">
        <div class="flex flex-wrap gap-3">
            <span class="inline-flex items-center gap-2">
                <span class="h-2 w-2 rounded-full bg-fuchsia-500"></span>
                {{ $settings['tagline'] ?? 'Layanan 24 Jam • Door-to-door • Travel • Rental • Paket Kilat' }}
            </span>
        </div>
        <div class="hidden sm:flex items-center gap-4">
            <a class="hover:text-slate-900 dark:hover:text-white"
                href="mailto:{{ $settings['email'] ?? 'info@d3travel.com' }}">{{ $settings['email'] ?? 'info@d3travel.com' }}</a>
            <span class="opacity-60">•</span>
            <a class="hover:text-slate-900 dark:hover:text-white"
                href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6282298900309' }}" target="_blank"
                rel="noreferrer">WA: {{ $settings['whatsapp_display'] ?? '0822-9890-0309' }}</a>
        </div>
    </div>
</div>