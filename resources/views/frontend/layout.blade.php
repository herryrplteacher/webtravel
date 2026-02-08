<!doctype html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', $settings['site_name'] ?? 'D3 Travel') — @yield('subtitle', 'Modern UI')</title>

    <meta name="description"
        content="@yield('description', 'Layanan travel door-to-door terpercaya dengan armada nyaman dan driver profesional')" />

    <!-- SEO Meta Tags -->
    <meta name="keywords" content="travel, rental mobil, door to door, {{ $settings['site_name'] ?? 'D3 Travel' }}" />
    <meta name="author" content="{{ $settings['site_name'] ?? 'D3 Travel' }}" />

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', $settings['site_name'] ?? 'D3 Travel')" />
    <meta property="og:description" content="@yield('description', 'Layanan travel terpercaya')" />
    <meta property="og:type" content="website" />

    @vite(['resources/css/app.css'])

    @stack('styles')
</head>

<body class="min-h-screen bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100">
    <!-- Background blobs -->
    <div class="pointer-events-none fixed inset-0 -z-10">
        <div
            class="absolute -top-24 left-1/2 h-72 w-[42rem] -translate-x-1/2 rounded-full bg-gradient-to-r from-blue-200/60 via-sky-200/60 to-cyan-200/60 blur-3xl dark:from-blue-500/15 dark:via-sky-500/15 dark:to-cyan-500/15">
        </div>
        <div class="absolute top-72 left-10 h-56 w-56 rounded-full bg-blue-200/40 blur-3xl dark:bg-blue-500/10">
        </div>
        <div
            class="absolute bottom-24 right-10 h-72 w-72 rounded-full bg-cyan-200/30 blur-3xl dark:bg-cyan-500/10">
        </div>
    </div>

    <!-- Top bar -->
    @include('frontend.partials.topbar')

    <!-- Navbar -->
    @include('frontend.partials.navbar')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('frontend.partials.footer')

    <!-- Scripts -->
    <script>
        // ===== Theme (dark/light) =====
        const root = document.documentElement;
        const themeBtn = document.getElementById("themeBtn");
        const themeIcon = document.getElementById("themeIcon");

        function applyTheme(mode) {
            if (mode === "dark") {
                root.classList.add("dark");
                themeIcon.textContent = "☀️";
            } else {
                root.classList.remove("dark");
                themeIcon.textContent = "🌙";
            }
            localStorage.setItem("theme", mode);
        }

        const saved = localStorage.getItem("theme");
        const prefersDark = window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches;
        applyTheme(saved || (prefersDark ? "dark" : "light"));

        themeBtn.addEventListener("click", () => {
            applyTheme(root.classList.contains("dark") ? "light" : "dark");
        });

        // ===== Mobile menu =====
        const menuBtn = document.getElementById("menuBtn");
        const mobileMenu = document.getElementById("mobileMenu");
        const menuIcon = document.getElementById("menuIcon");

        menuBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
            menuIcon.textContent = mobileMenu.classList.contains("hidden") ? "☰" : "✕";
        });

        document.querySelectorAll(".mobile-menu-link").forEach(link => {
            link.addEventListener("click", () => {
                mobileMenu.classList.add("hidden");
                menuIcon.textContent = "☰";
            });
        });

        document.addEventListener("click", (e) => {
            if (!mobileMenu.contains(e.target) && !menuBtn.contains(e.target) && !mobileMenu.classList.contains("hidden")) {
                mobileMenu.classList.add("hidden");
                menuIcon.textContent = "☰";
            }
        });

        // ===== Footer year =====
        document.getElementById("year").textContent = new Date().getFullYear();
    </script>

    @stack('scripts')
</body>

</html>
