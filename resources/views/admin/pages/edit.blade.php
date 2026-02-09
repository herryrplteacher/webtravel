@extends('admin.master')

@section('title')
    <title>Edit Page</title>
@endsection

@section('content')
    <div class="min-h-screen page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 pb-6">
                <div class="md:flex items-center justify-between px-[2px]">
                    <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">
                        Edit Page</h4>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                            <li class="inline-flex items-center">
                                <a href="{{ route('index.page') }}"
                                    class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                    Page
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center rtl:mr-2">
                                    <i
                                        class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                    <span
                                        class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100">Edit
                                        Page</span>
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
                                Form Edit Page
                            </h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.page', $page->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100" for="title">
                                        Judul <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('title') border-red-500 @enderror"
                                        type="text" id="title" name="title" value="{{ old('title', $page->title) }}"
                                        placeholder="Masukkan judul halaman" maxlength="150" required>
                                    @error('title')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100" for="content">
                                        Konten
                                    </label>
                                    <textarea
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('content') border-red-500 @enderror"
                                        id="content" name="content" rows="10" placeholder="Masukkan konten halaman">{{ old('content', $page->content) }}</textarea>
                                    @error('content')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Anda dapat menggunakan HTML untuk format konten</p>
                                </div>

                                <!-- About Us Extra Fields -->
                                @php
                                    $meta = $page->meta ?? [];
                                    $stats = $meta['stats'] ?? [];
                                @endphp
                                <div class="mb-4 p-4 border border-dashed border-violet-300 dark:border-violet-600 rounded bg-violet-50/50 dark:bg-violet-900/10">
                                    <h6 class="mb-4 text-sm font-semibold text-violet-700 dark:text-violet-300">
                                        <i class="fas fa-info-circle mr-1"></i> Data Tambahan (About Us)
                                    </h6>

                                    <!-- Statistik -->
                                    <div class="mb-4">
                                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Statistik</label>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                            @for ($i = 0; $i < 4; $i++)
                                                <div class="flex gap-2">
                                                    <input type="text" name="stat_value[]"
                                                        value="{{ old('stat_value.' . $i, $stats[$i]['value'] ?? '') }}"
                                                        placeholder="Nilai (cth: 10+)"
                                                        class="w-1/3 py-2 px-3 rounded border-gray-300 focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100 text-sm">
                                                    <input type="text" name="stat_label[]"
                                                        value="{{ old('stat_label.' . $i, $stats[$i]['label'] ?? '') }}"
                                                        placeholder="Label (cth: Tahun pengalaman)"
                                                        class="w-2/3 py-2 px-3 rounded border-gray-300 focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100 text-sm">
                                                </div>
                                            @endfor
                                        </div>
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Kosongkan jika tidak diperlukan</p>
                                    </div>

                                    <!-- Visi & Misi -->
                                    <div class="mb-4">
                                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100" for="visi_misi">
                                            Visi & Misi
                                        </label>
                                        <textarea
                                            class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100"
                                            id="visi_misi" name="visi_misi" rows="3"
                                            placeholder="Masukkan visi & misi">{{ old('visi_misi', $meta['visi_misi'] ?? '') }}</textarea>
                                    </div>

                                    <!-- Gambar -->
                                    <div class="mb-2">
                                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Gambar About Us</label>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                            @foreach (['image_main' => 'Gambar Utama', 'image_second' => 'Gambar Kedua', 'image_third' => 'Gambar Ketiga'] as $key => $label)
                                                <div>
                                                    <label class="block mb-1 text-xs text-gray-500 dark:text-gray-400">{{ $label }}</label>
                                                    @if (!empty($meta[$key]))
                                                        <div class="mb-2">
                                                            <img src="{{ asset('storage/' . $meta[$key]) }}" alt="{{ $label }}"
                                                                class="w-full h-24 object-cover rounded border border-gray-200 dark:border-zinc-600">
                                                        </div>
                                                    @endif
                                                    <input type="file" name="{{ $key }}" accept="image/*"
                                                        class="w-full text-sm py-1.5 px-3 rounded border border-gray-300 dark:border-zinc-600 dark:bg-zinc-700/50 dark:text-zinc-100 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:bg-violet-100 file:text-violet-700 file:text-xs">
                                                    @if (!empty($meta[$key]))
                                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Upload baru untuk mengganti gambar</p>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format: JPG, PNG, WebP. Maks: 2MB per gambar</p>
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="is_published" name="is_published" value="1"
                                            {{ old('is_published', $page->is_published) ? 'checked' : '' }}
                                            class="w-4 h-4 text-violet-600 bg-gray-100 border-gray-300 rounded focus:ring-violet-500 dark:focus:ring-violet-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="is_published"
                                            class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-100">
                                            Publish
                                        </label>
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <button type="submit"
                                        class="btn bg-violet-500 text-white hover:bg-violet-600 focus:ring focus:ring-violet-500/30 px-6 py-2 rounded">
                                        Update
                                    </button>
                                    <a href="{{ route('index.page') }}"
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
