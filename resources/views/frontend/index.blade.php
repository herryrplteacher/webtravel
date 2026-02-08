@extends('frontend.layout')

@section('title', $settings['site_name'] ?? 'D3 Travel')
@section('subtitle', 'Modern Booking System')
@section('description', 'Layanan travel door-to-door terpercaya dengan armada nyaman dan driver profesional')


@section('content')
    <!-- Hero Section -->
    @include('frontend.sections.hero')

    <!-- Routes Section -->
    @include('frontend.sections.routes')

    <!-- Services Section -->
    @include('frontend.sections.services')

    <!-- Features Section -->
    @include('frontend.sections.features')

    <!-- About Section -->
    @include('frontend.sections.about')

    <!-- Gallery Section -->
    @include('frontend.sections.gallery')

    <!-- Schedule Section -->
    @include('frontend.sections.schedule')

    <!-- Reviews/Testimonial Section -->
    @include('frontend.sections.reviews')
@endsection

@push('scripts')
    <script>
        // Make routes data available to JavaScript
        window.ROUTES_DATA = {!! json_encode($routes->map(function ($route) {
        return [
            'id' => $route->id,
            'title' => $route->from_location->name . ' ↔ ' . $route->to_location->name,
            'from' => $route->from_location->name,
            'to' => $route->to_location->name,
            'service' => $route->service->name ?? 'Door to Door',
            'priceFrom' => $route->price_from,
            'duration' => $route->duration ?? '± 4-6 jam',
            'perks' => $route->facilities->pluck('label')->toArray(),
            'cover' => $route->cover_image ? asset('storage/' . $route->cover_image) : 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1400&q=80',
        ];
    })) !!};

        window.SERVICES_DATA = {!! json_encode($services) !!};
        window.WA_NUMBER = '{{ $settings["wa_number"] ?? "6282298900309" }}';
    </script>

    <script>
        // ===== Travelers counter =====
        let travelers = 2;
        const travCount = document.getElementById("travCount");

        if (document.getElementById("decBtn")) {
            document.getElementById("decBtn").addEventListener("click", () => {
                travelers = Math.max(1, travelers - 1);
                travCount.textContent = travelers;
            });
        }

        if (document.getElementById("incBtn")) {
            document.getElementById("incBtn").addEventListener("click", () => {
                travelers = Math.min(12, travelers + 1);
                travCount.textContent = travelers;
            });
        }

        // ===== Cek Tarif Button =====
        if (document.getElementById("cekTarifBtn")) {
            document.getElementById("cekTarifBtn").addEventListener("click", () => {
                const kotaAsal = document.getElementById("qInput").value.trim() || "(Kota Asal)";
                const kotaTujuan = document.getElementById("toInput").value.trim() || "(Kota Tujuan)";
                const selectedService = document.getElementById("svcSelect").value === "All" ? "Door to Door" : document.getElementById("svcSelect").value;
                const selectedDate = document.getElementById("dateInput").value || new Date().toISOString().split('T')[0];
                const pax = travelers;

                const message = `Halo admin {{ $settings['site_name'] ?? 'D3 Travel' }}, Cek Info Tarif Travel ${selectedService} tanggal ${selectedDate} dari ${kotaAsal} ke ${kotaTujuan} untuk ${pax} orang penumpang.`;
                window.open(`https://wa.me/${window.WA_NUMBER}?text=${encodeURIComponent(message)}`, "_blank");
            });
        }

        // ===== Route filtering and rendering =====
        const qInput = document.getElementById("qInput");
        const toInput = document.getElementById("toInput");
        const svcSelect = document.getElementById("svcSelect");
        const dateInput = document.getElementById("dateInput");
        const routesGrid = document.getElementById("routesGrid");
        const countLabel = document.getElementById("countLabel");

        function formatIDR(n) {
            return new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR", maximumFractionDigits: 0 }).format(n);
        }

        function routeCard(r) {
            const selectedDate = dateInput.value || new Date().toISOString().split('T')[0];
            const message = `Halo admin {{ $settings['site_name'] ?? 'D3 Travel' }}, Cek Info Tarif Travel ${r.service} tanggal ${selectedDate} dari ${r.from} ke ${r.to} untuk ${travelers} orang penumpang.`;
            const waLink = `https://wa.me/${window.WA_NUMBER}?text=${encodeURIComponent(message)}`;
            const detailLink = `{{ url('/route') }}/${r.id}`;

            return `
                                                    <article class="group overflow-hidden rounded-[1.5rem] border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-slate-800 dark:bg-slate-900">
                                                      <div class="relative">
                                                        <img src="${r.cover}" alt="${r.title}" loading="lazy"
                                                          class="h-44 w-full object-cover transition duration-300 group-hover:scale-[1.03]" />
                                                        <div class="absolute left-3 top-3 inline-flex items-center gap-2 rounded-full bg-white/80 px-3 py-1 text-xs font-semibold text-slate-800 backdrop-blur dark:bg-slate-950/60 dark:text-slate-100 dark:border dark:border-slate-800">
                                                          <span class="h-2 w-2 rounded-full bg-slate-900/70 dark:bg-white/70"></span>
                                                          ${r.service}
                                                        </div>
                                                      </div>

                                                      <div class="p-4">
                                                        <h3 class="text-sm font-semibold">${r.title}</h3>
                                                        <p class="mt-1 text-xs text-slate-600 dark:text-slate-300">
                                                          Durasi ${r.duration} • Mulai ${formatIDR(r.priceFrom)}
                                                        </p>

                                                        <div class="mt-3 flex flex-wrap gap-2">
                                                          ${r.perks.slice(0, 3).map(p => `
                                                            <span class="rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-[11px] text-slate-700 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-200">${p}</span>
                                                          `).join("")}
                                                        </div>

                                                        <div class="mt-4 flex flex-col gap-2">
                                                          <div class="flex items-center justify-between gap-2">
                                                            <a href="${detailLink}"
                                                              class="flex-1 rounded-2xl border border-slate-200 bg-white px-3 py-2 text-center text-xs font-semibold text-slate-800 hover:bg-slate-50 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100 dark:hover:bg-slate-800">
                                                              Detail
                                                            </a>

                                                            <a href="${waLink}" target="_blank" rel="noreferrer"
                                                              class="flex-1 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-600 px-3 py-2 text-center text-xs font-semibold text-white hover:from-blue-700 hover:to-cyan-700">
                                                              Cek Tarif via WA
                                                            </a>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </article>
                                                  `;
        }

        function renderRoutes() {
            const qFrom = (qInput.value || "").trim().toLowerCase();
            const qTo = (toInput.value || "").trim().toLowerCase();
            const svc = svcSelect.value;

            const filtered = window.ROUTES_DATA.filter(r => {
                const matchFrom = !qFrom || [r.from, r.title].join(" ").toLowerCase().includes(qFrom);
                const matchTo = !qTo || [r.to, r.title].join(" ").toLowerCase().includes(qTo);
                const matchS = (svc === "All") || (r.service === svc);
                return matchFrom && matchTo && matchS;
            });

            routesGrid.innerHTML = filtered.map(routeCard).join("");
            countLabel.textContent = filtered.length;
        }

        if (qInput && toInput && svcSelect && dateInput && routesGrid) {
            qInput.addEventListener("input", renderRoutes);
            toInput.addEventListener("input", renderRoutes);
            svcSelect.addEventListener("change", renderRoutes);
            dateInput.addEventListener("change", renderRoutes);
            renderRoutes(); // Initial render
        }

        // ===== Gallery navigation =====
        const galleryPrev = document.getElementById("galleryPrev");
        const galleryNext = document.getElementById("galleryNext");
        const galleryTrack = document.getElementById("galleryTrack");

        if (galleryPrev && galleryNext && galleryTrack) {
            galleryPrev.addEventListener("click", () => {
                galleryTrack.scrollBy({ left: -300, behavior: "smooth" });
            });
            galleryNext.addEventListener("click", () => {
                galleryTrack.scrollBy({ left: 300, behavior: "smooth" });
            });
        }

        // ===== Service Cards Click to WhatsApp =====
        document.querySelectorAll(".service-card").forEach(card => {
            card.addEventListener("click", function () {
                const serviceName = this.getAttribute("data-service");
                const searchQuery = qInput.value || "";
                const selectedDate = dateInput.value || new Date().toISOString().split('T')[0];
                const pax = travelers;

                let dari = searchQuery || "(Kota Asal)";
                let ke = "(Kota Tujuan)";

                if (searchQuery.includes("ke ") || searchQuery.includes("→") || searchQuery.includes("-")) {
                    const parts = searchQuery.split(/ke |→|-/i);
                    if (parts.length >= 2) {
                        dari = parts[0].trim() || "(Kota Asal)";
                        ke = parts[1].trim() || "(Kota Tujuan)";
                    }
                }

                const message = `Halo admin {{ $settings['site_name'] ?? 'D3 Travel' }}, Cek Info Tarif Travel ${serviceName} tanggal ${selectedDate} dari ${dari} ke ${ke} untuk ${pax} orang penumpang.`;
                window.open(`https://wa.me/${window.WA_NUMBER}?text=${encodeURIComponent(message)}`, "_blank");
            });
        });
    </script>
@endpush
