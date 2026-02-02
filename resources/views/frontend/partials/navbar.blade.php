<header
    class="sticky top-0 z-40 border-b border-slate-200/70 bg-white/70 backdrop-blur dark:border-slate-800/70 dark:bg-slate-900/50">
    <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-3">
        <a href="{{ route('frontend.index') }}" class="flex items-center gap-2">
            <div
                class="grid h-10 w-10 place-items-center rounded-2xl bg-gradient-to-br from-purple-600 to-fuchsia-600 text-white shadow-sm">
                <span class="text-sm font-bold">{{ substr($settings['site_name'] ?? 'D3', 0, 2) }}</span>
            </div>
            <div class="leading-tight">
                <p class="text-sm font-semibold">{{ $settings['site_name'] ?? 'D3 Travel' }}</p>
                <p class="text-xs text-slate-500 dark:text-slate-400">
                    {{ $settings['site_tagline'] ?? 'Modern booking • Fast confirmation' }}</p>
            </div>
        </a>

        <nav class="hidden items-center gap-6 text-sm text-slate-600 dark:text-slate-300 md:flex">
            <a class="hover:text-slate-900 dark:hover:text-white" href="#routes">Rute</a>
            <a class="hover:text-slate-900 dark:hover:text-white" href="#services">Layanan</a>
            <a class="hover:text-slate-900 dark:hover:text-white" href="#features">Keunggulan</a>
            <a class="hover:text-slate-900 dark:hover:text-white" href="#about">Tentang</a>
            <a class="hover:text-slate-900 dark:hover:text-white" href="#gallery">Galeri</a>
            <a class="hover:text-slate-900 dark:hover:text-white" href="#reviews">Testimoni</a>
        </nav>

        <div class="flex items-center gap-2">
            <button id="themeBtn"
                class="grid h-10 w-10 place-items-center rounded-2xl border border-slate-200 bg-white text-slate-800 shadow-sm hover:bg-slate-50 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800"
                aria-label="Toggle theme">
                <span id="themeIcon">🌙</span>
            </button>

            <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6282298900309' }}" target="_blank"
                rel="noreferrer"
                class="hidden rounded-2xl bg-gradient-to-r from-purple-600 to-fuchsia-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:from-purple-700 hover:to-fuchsia-700 sm:inline-flex">
                Chat WhatsApp
            </a>

            <button id="menuBtn"
                class="grid h-10 w-10 place-items-center rounded-2xl border border-slate-200 bg-white text-xl text-slate-800 shadow-sm hover:bg-slate-50 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800 md:hidden"
                aria-label="Toggle menu">
                <span id="menuIcon">☰</span>
            </button>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobileMenu"
        class="hidden overflow-hidden border-t border-slate-200/70 bg-white/95 backdrop-blur dark:border-slate-800/70 dark:bg-slate-900/95 md:hidden">
        <div class="mx-auto max-w-6xl px-4 py-3">
            <div class="grid gap-1 text-sm text-slate-700 dark:text-slate-200">
                <a class="mobile-menu-link rounded-2xl px-3 py-2 hover:bg-slate-50 dark:hover:bg-slate-800"
                    href="#routes">Rute</a>
                <a class="mobile-menu-link rounded-2xl px-3 py-2 hover:bg-slate-50 dark:hover:bg-slate-800"
                    href="#services">Layanan</a>
                <a class="mobile-menu-link rounded-2xl px-3 py-2 hover:bg-slate-50 dark:hover:bg-slate-800"
                    href="#features">Keunggulan</a>
                <a class="mobile-menu-link rounded-2xl px-3 py-2 hover:bg-slate-50 dark:hover:bg-slate-800"
                    href="#about">Tentang</a>
                <a class="mobile-menu-link rounded-2xl px-3 py-2 hover:bg-slate-50 dark:hover:bg-slate-800"
                    href="#gallery">Galeri</a>
                <a class="mobile-menu-link rounded-2xl px-3 py-2 hover:bg-slate-50 dark:hover:bg-slate-800"
                    href="#reviews">Testimoni</a>
                <a class="rounded-2xl bg-gradient-to-r from-purple-600 to-fuchsia-600 px-3 py-2 text-center font-semibold text-white hover:from-purple-700 hover:to-fuchsia-700"
                    href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6282298900309' }}" target="_blank"
                    rel="noreferrer">
                    💬 Chat WhatsApp
                </a>
            </div>
        </div>
    </div>
</header>