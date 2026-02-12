@extends('admin.master')

@section('title')
    <title>Edit Promosi</title>
@endsection

@section('content')
    <div class="min-h-screen page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 pb-6">
                <div class="md:flex items-center justify-between px-[2px]">
                    <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">
                        Edit Promosi</h4>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                            <li class="inline-flex items-center">
                                <a href="{{ route('index.promotion') }}"
                                    class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                    Promosi
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center rtl:mr-2">
                                    <i
                                        class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                    <span
                                        class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100">Edit
                                        Promosi</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- content start -->
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-12">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                            <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100 font-semibold">
                                Form Edit Promosi Hero
                            </h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.promotion', $promotion->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                        for="title">Judul Promosi <span class="text-red-500">*</span></label>
                                    <input
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('title') border-red-500 @enderror"
                                        type="text" id="title" name="title" value="{{ old('title', $promotion->title) }}"
                                        placeholder="Masukkan judul promosi">
                                    @error('title')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                        for="description">Deskripsi</label>
                                    <textarea
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('description') border-red-500 @enderror"
                                        id="description" name="description" rows="3"
                                        placeholder="Masukkan deskripsi promosi (opsional)">{{ old('description', $promotion->description) }}</textarea>
                                    @error('description')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                        for="image">Gambar Banner</label>

                                    <!-- Current Image -->
                                    @if($promotion->image)
                                        <div class="mb-3">
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Gambar saat ini:</p>
                                            <img src="{{ asset('storage/' . $promotion->image) }}"
                                                alt="{{ $promotion->title }}"
                                                class="w-64 h-36 object-cover rounded border border-gray-300 dark:border-zinc-600">
                                        </div>
                                    @endif

                                    <input
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100 @error('image') border-red-500 @enderror"
                                        type="file" id="image" name="image" accept="image/*">
                                    @error('image')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Kosongkan jika tidak ingin mengganti gambar. Format: JPG, JPEG, PNG, WEBP. Maksimal 2MB</p>

                                    <!-- Preview -->
                                    <div id="imagePreview" class="mt-3 hidden">
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Gambar baru:</p>
                                        <img id="previewImg" src="" alt="Preview"
                                            class="w-64 h-36 object-cover rounded border border-gray-300 dark:border-zinc-600">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                            for="button_text">Teks Tombol</label>
                                        <input
                                            class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('button_text') border-red-500 @enderror"
                                            type="text" id="button_text" name="button_text" value="{{ old('button_text', $promotion->button_text) }}"
                                            placeholder="Contoh: Pesan Sekarang">
                                        @error('button_text')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                            for="button_url">URL Tombol</label>
                                        <input
                                            class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('button_url') border-red-500 @enderror"
                                            type="text" id="button_url" name="button_url" value="{{ old('button_url', $promotion->button_url) }}"
                                            placeholder="Contoh: https://wa.me/6282298900309">
                                        @error('button_url')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Kosongkan untuk link ke WhatsApp default</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                            for="start_date">Tanggal Mulai</label>
                                        <input
                                            class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('start_date') border-red-500 @enderror"
                                            type="date" id="start_date" name="start_date" value="{{ old('start_date', $promotion->start_date?->format('Y-m-d')) }}">
                                        @error('start_date')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                            for="end_date">Tanggal Selesai</label>
                                        <input
                                            class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('end_date') border-red-500 @enderror"
                                            type="date" id="end_date" name="end_date" value="{{ old('end_date', $promotion->end_date?->format('Y-m-d')) }}">
                                        @error('end_date')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                        for="sort_order">Urutan</label>
                                    <input
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('sort_order') border-red-500 @enderror"
                                        type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $promotion->sort_order) }}"
                                        min="0" placeholder="0">
                                    @error('sort_order')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Angka kecil ditampilkan lebih dulu</p>
                                </div>

                                <div class="mb-6">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="is_active" name="is_active" value="1"
                                            {{ old('is_active', $promotion->is_active) ? 'checked' : '' }}
                                            class="w-4 h-4 text-violet-600 bg-gray-100 border-gray-300 rounded focus:ring-violet-500 dark:focus:ring-violet-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="is_active"
                                            class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-100">
                                            Aktif (tampilkan di hero section frontend)
                                        </label>
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <button type="submit"
                                        class="btn bg-violet-500 text-white hover:bg-violet-600 focus:ring focus:ring-violet-500/30 px-6 py-2 rounded">
                                        Update
                                    </button>
                                    <a href="{{ route('index.promotion') }}"
                                        class="btn bg-gray-200 text-gray-700 hover:bg-gray-300 focus:ring focus:ring-gray-300/30 px-6 py-2 rounded dark:bg-zinc-600 dark:text-gray-100 dark:hover:bg-zinc-700">
                                        Batal
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content end -->

            <!-- Footer Start -->
            @include('admin.components.footer')
            <!-- end Footer -->
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
            }
        });
    </script>
@endsection
