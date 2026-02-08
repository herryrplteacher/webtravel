<!-- Gallery -->
<section id="gallery" class="mx-auto max-w-6xl px-4 pt-12">
    <div
        class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-soft dark:border-slate-800 dark:bg-slate-900">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h2 class="text-2xl font-semibold tracking-tight">Galeri</h2>
                <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Armada dan momen perjalanan bersama kami.
                </p>
            </div>
            <div class="flex items-center gap-2">
                <button id="galleryPrev"
                    class="grid h-10 w-10 place-items-center rounded-2xl border border-slate-200 bg-white text-slate-800 hover:bg-slate-50 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800"
                    aria-label="Previous">←</button>
                <button id="galleryNext"
                    class="grid h-10 w-10 place-items-center rounded-2xl border border-slate-200 bg-white text-slate-800 hover:bg-slate-50 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800"
                    aria-label="Next">→</button>
            </div>
        </div>

        <div class="mt-6 overflow-hidden">
            <div id="galleryTrack"
                class="grid grid-cols-1 gap-4 transition-transform duration-500 sm:grid-cols-2 lg:grid-cols-3">

                @forelse($galleries as $item)
                    <div class="group relative overflow-hidden rounded-3xl">
                        <img class="h-64 w-full object-cover transition duration-300 group-hover:scale-110"
                            src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" loading="lazy" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/0 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                            <div class="absolute bottom-4 left-4 right-4 text-white">
                                <p class="text-sm font-semibold">{{ $item->title }}</p>
                                @if($item->description)
                                    <p class="text-xs text-white/80">{{ $item->description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- Fallback static gallery if no data --}}
                    @php
                        $fallbackItems = [
                            ['img' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?auto=format&fit=crop&w=800&q=80', 'title' => 'Armada Avanza', 'desc' => 'Nyaman untuk 6-7 penumpang'],
                            ['img' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80', 'title' => 'Driver Profesional', 'desc' => 'Berpengalaman & ramah'],
                            ['img' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=800&q=80', 'title' => 'Interior Nyaman', 'desc' => 'Full AC & charger tersedia'],
                            ['img' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=800&q=80', 'title' => 'Armada Hiace', 'desc' => 'Untuk rombongan besar'],
                            ['img' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80', 'title' => 'Perjalanan Nyaman', 'desc' => 'Seat empuk & lega'],
                            ['img' => 'https://images.unsplash.com/photo-1526772662000-3f88f10405ff?auto=format&fit=crop&w=800&q=80', 'title' => 'Bagasi Luas', 'desc' => 'Muat banyak barang bawaan'],
                        ];
                    @endphp

                    @foreach($fallbackItems as $fallback)
                        <div class="group relative overflow-hidden rounded-3xl">
                            <img class="h-64 w-full object-cover transition duration-300 group-hover:scale-110"
                                src="{{ $fallback['img'] }}" alt="{{ $fallback['title'] }}" loading="lazy" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/0 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                <div class="absolute bottom-4 left-4 right-4 text-white">
                                    <p class="text-sm font-semibold">{{ $fallback['title'] }}</p>
                                    <p class="text-xs text-white/80">{{ $fallback['desc'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforelse
            </div>
        </div>

        <div
            class="mt-6 rounded-3xl border border-slate-200 bg-slate-50 p-4 text-center dark:border-slate-800 dark:bg-slate-950">
            <p class="text-sm text-slate-600 dark:text-slate-300">
                📸 Lihat lebih banyak foto armada dan testimoni pelanggan di
                <a class="font-semibold text-slate-900 hover:underline dark:text-white"
                    href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6282298900309' }}" target="_blank"
                    rel="noreferrer">WhatsApp Business kami</a>
            </p>
        </div>
    </div>
</section>
