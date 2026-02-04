<!-- Reviews / Testimonials -->
<section id="reviews" class="mx-auto max-w-6xl px-4 py-14">
    <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-soft dark:border-slate-800 dark:bg-slate-900">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-semibold tracking-tight">Apa kata pelanggan?</h2>
                <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Testimoni dari pelanggan kami yang puas.
                </p>
            </div>
            <button onclick="toggleTestimonialModal()"
                class="inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:from-blue-700 hover:to-cyan-700">
                <span>✍️</span> Tulis Testimoni
            </button>
        </div>

        <div class="mt-6 grid gap-4 md:grid-cols-3">
            @forelse($testimonials as $testimonial)
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-800 dark:bg-slate-950">
                    @if ($testimonial->photo)
                        <div class="mb-3 flex items-center gap-3">
                            <img src="{{ Storage::url($testimonial->photo) }}" alt="{{ $testimonial->name }}"
                                class="h-12 w-12 rounded-full object-cover border-2 border-slate-200 dark:border-slate-700">
                            <div>
                                <p class="text-sm font-semibold text-slate-800 dark:text-slate-100">
                                    {{ $testimonial->name }}</p>
                                @if ($testimonial->position || $testimonial->company)
                                    <p class="text-xs text-slate-600 dark:text-slate-400">
                                        {{ $testimonial->position }}@if ($testimonial->position && $testimonial->company)
                                            ,
                                        @endif{{ $testimonial->company }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endif

                    <div class="text-amber-400 flex items-center gap-1">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $testimonial->rating)
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                            @else
                                <svg class="w-5 h-5 fill-current text-slate-300 dark:text-slate-700"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                            @endif
                        @endfor
                    </div>

                    <p class="mt-3 text-sm text-slate-700 dark:text-slate-200 leading-relaxed">
                        {{ $testimonial->message }}</p>

                    @if (!$testimonial->photo)
                        <div class="mt-3 pt-3 border-t border-slate-200 dark:border-slate-800">
                            <p class="text-sm font-semibold text-slate-800 dark:text-slate-100">{{ $testimonial->name }}
                            </p>
                            @if ($testimonial->position || $testimonial->company)
                                <p class="text-xs text-slate-600 dark:text-slate-400">
                                    {{ $testimonial->position }}@if ($testimonial->position && $testimonial->company)
                                        ,
                                    @endif{{ $testimonial->company }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
            @empty
                <div class="col-span-3 text-center py-8">
                    <p class="text-slate-500 dark:text-slate-400">Belum ada testimoni.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Testimonial Modal -->
<div id="testimonialModal"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
    <div
        class="relative mx-4 w-full max-w-2xl rounded-3xl border border-slate-200 bg-white p-6 shadow-2xl dark:border-slate-800 dark:bg-slate-900">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-semibold text-slate-800 dark:text-slate-100">Tulis Testimoni Anda</h3>
            <button onclick="toggleTestimonialModal()"
                class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        @if (session('testimonial_success'))
            <div
                class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-2xl dark:bg-green-900/30 dark:border-green-800 dark:text-green-300">
                {{ session('testimonial_success') }}
            </div>
        @endif

        <form action="{{ route('frontend.testimonial.store') }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf

            <div>
                <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-2.5 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                    placeholder="Masukkan nama Anda">
                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Posisi</label>
                    <input type="text" name="position" value="{{ old('position') }}"
                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-2.5 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                        placeholder="Contoh: Manager">
                    @error('position')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Perusahaan</label>
                    <input type="text" name="company" value="{{ old('company') }}"
                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-2.5 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                        placeholder="Contoh: PT. ABC">
                    @error('company')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">
                    Pesan Testimoni <span class="text-red-500">*</span>
                </label>
                <textarea name="message" rows="4" required
                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-2.5 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100"
                    placeholder="Ceritakan pengalaman Anda menggunakan layanan kami...">{{ old('message') }}</textarea>
                @error('message')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">
                    Rating <span class="text-red-500">*</span>
                </label>
                <div class="flex gap-2" id="starRating">
                    @for ($i = 1; $i <= 5; $i++)
                        <label class="cursor-pointer">
                            <input type="radio" name="rating" value="{{ $i }}"
                                {{ old('rating', 5) == $i ? 'checked' : '' }} class="hidden peer" required>
                            <svg class="w-8 h-8 fill-current text-slate-300 peer-checked:text-amber-400 hover:text-amber-300 transition-colors"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                        </label>
                    @endfor
                </div>
                @error('rating')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-slate-700 dark:text-slate-300">Foto (Opsional)</label>
                <input type="file" name="photo" accept="image/*"
                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-2.5 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-100">
                @error('photo')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Format: JPG, PNG. Maksimal 2MB</p>
            </div>

            <div class="p-4 bg-amber-50 border border-amber-200 rounded-2xl dark:bg-amber-900/20 dark:border-amber-800">
                <p class="text-xs text-amber-800 dark:text-amber-300">
                    ℹ️ Testimoni Anda akan direview oleh admin terlebih dahulu sebelum ditampilkan.
                </p>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                    class="flex-1 inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:from-blue-700 hover:to-cyan-700">
                    Kirim Testimoni
                </button>
                <button type="button" onclick="toggleTestimonialModal()"
                    class="px-6 py-3 rounded-2xl border-2 border-slate-200 bg-white text-sm font-semibold text-slate-700 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-700">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleTestimonialModal() {
        const modal = document.getElementById('testimonialModal');
        modal.classList.toggle('hidden');
    }

    // Close modal when clicking outside
    document.getElementById('testimonialModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            toggleTestimonialModal();
        }
    });

    // Show modal if there are validation errors
    @if ($errors->any() && old('name'))
        document.addEventListener('DOMContentLoaded', function() {
            toggleTestimonialModal();
        });
    @endif

    // Show modal if success message
    @if (session('testimonial_success'))
        document.addEventListener('DOMContentLoaded', function() {
            toggleTestimonialModal();
            setTimeout(() => {
                toggleTestimonialModal();
            }, 3000);
        });
    @endif
</script>
