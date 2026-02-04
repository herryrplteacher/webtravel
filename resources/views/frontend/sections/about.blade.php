<!-- About Us -->
<section id="about" class="mx-auto max-w-6xl px-4 pt-12">
    <div
        class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-soft dark:border-slate-800 dark:bg-slate-900">
        <div class="grid gap-8 lg:grid-cols-[1fr_1.2fr] lg:items-center">
            <div>
                <h2 class="text-2xl font-semibold tracking-tight">Tentang Kami</h2>

                @if($aboutPage)
                    <div class="mt-3 text-sm leading-relaxed text-slate-600 dark:text-slate-300 prose prose-sm dark:prose-invert max-w-none">
                        {!! Str::limit($aboutPage->content, 500) !!}
                    </div>
                @else
                    <p class="mt-3 text-sm leading-relaxed text-slate-600 dark:text-slate-300">
                        <strong class="font-semibold text-slate-900 dark:text-white">{{ $settings['site_name'] ?? 'D3 Travel' }}</strong> adalah
                        layanan travel terpercaya yang telah melayani perjalanan antar kota sejak lama. Kami berkomitmen
                        memberikan pengalaman perjalanan yang nyaman, aman, dan tepat waktu.
                    </p>
                   <p class="mt-3 text-sm leading-relaxed text-slate-600 dark:text-slate-300">
                        Dengan armada terawat, driver berpengalaman, dan sistem booking yang mudah, kami siap
                        mengantarkan Anda
                        ke tujuan dengan pelayanan terbaik.
                    </p>
                @endif

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    @php
                    $stats = [
                        ['value' => '10+', 'label' => 'Tahun pengalaman'],
                        ['value' => '15+', 'label' => 'Armada tersedia'],
                        ['value' => '1000+', 'label' => 'Pelanggan puas'],
                        ['value' => '24/7', 'label' => 'Layanan siaga'],
                    ];
                    @endphp

                    @foreach($stats as $stat)
                    <div
                        class="rounded-3xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-800 dark:bg-slate-950">
                        <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $stat['value'] }}</p>
                        <p class="mt-1 text-xs text-slate-600 dark:text-slate-300">{{ $stat['label'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="grid gap-4">
                <div class="overflow-hidden rounded-3xl">
                    <img class="h-56 w-full object-cover"
                        src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=1400&q=80"
                        alt="Travel team" loading="lazy" />
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="overflow-hidden rounded-3xl">
                        <img class="h-32 w-full object-cover"
                            src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?auto=format&fit=crop&w=800&q=80"
                            alt="Car fleet" loading="lazy" />
                    </div>
                    <div class="overflow-hidden rounded-3xl">
                        <img class="h-32 w-full object-cover"
                            src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80"
                            alt="Professional driver" loading="lazy" />
                    </div>
                </div>
            </div>
        </div>

        <div
            class="mt-8 rounded-3xl border border-slate-200 bg-gradient-to-br from-blue-50 to-cyan-50 p-6 dark:border-slate-800 dark:from-blue-950/30 dark:to-cyan-950/30">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-lg font-semibold">Visi & Misi Kami</h3>
                    <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">
                        Menjadi pilihan utama layanan travel dengan standar kualitas terbaik, memberikan kenyamanan
                        dan
                        keamanan di setiap perjalanan.
                    </p>
                </div>
                <a class="inline-flex rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-600 px-4 py-2 text-sm font-semibold text-white hover:from-blue-700 hover:to-cyan-700"
                    href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6282298900309' }}" target="_blank" rel="noreferrer">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>
