@extends('admin.master')

@section('title')
    <title>Edit Testimoni</title>
@endsection

@section('content')
    <div class="min-h-screen page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 pb-6">
                <div class="md:flex items-center justify-between px-[2px]">
                    <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">
                        Edit Testimoni</h4>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                            <li class="inline-flex items-center">
                                <a href="{{ route('index.testimonial') }}"
                                    class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                    Testimoni
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center rtl:mr-2">
                                    <i
                                        class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                    <span
                                        class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100">Edit
                                        Testimoni</span>
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
                                Form Edit Testimoni
                            </h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.testimonial', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                        for="name">Nama <span class="text-red-500">*</span></label>
                                    <input
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('name') border-red-500 @enderror"
                                        type="text" id="name" name="name" value="{{ old('name', $testimonial->name) }}"
                                        placeholder="Masukkan nama pelanggan">
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                            for="position">Posisi</label>
                                        <input
                                            class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('position') border-red-500 @enderror"
                                            type="text" id="position" name="position" value="{{ old('position', $testimonial->position) }}"
                                            placeholder="Contoh: Manager">
                                        @error('position')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                            for="company">Perusahaan</label>
                                        <input
                                            class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('company') border-red-500 @enderror"
                                            type="text" id="company" name="company" value="{{ old('company', $testimonial->company) }}"
                                            placeholder="Contoh: PT. ABC Indonesia">
                                        @error('company')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                        for="message">Pesan Testimoni <span class="text-red-500">*</span></label>
                                    <textarea
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('message') border-red-500 @enderror"
                                        id="message" name="message" rows="4"
                                        placeholder="Masukkan pesan testimoni">{{ old('message', $testimonial->message) }}</textarea>
                                    @error('message')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                        for="rating">Rating <span class="text-red-500">*</span></label>
                                    <div class="flex gap-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            <label class="flex items-center">
                                                <input type="radio" name="rating" value="{{ $i }}"
                                                    {{ old('rating', $testimonial->rating) == $i ? 'checked' : '' }}
                                                    class="hidden peer">
                                                <span class="cursor-pointer text-3xl text-gray-300 peer-checked:text-amber-400 hover:text-amber-300 transition-colors">
                                                    ★
                                                </span>
                                            </label>
                                        @endfor
                                    </div>
                                    @error('rating')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Pilih rating dari 1 sampai 5 bintang</p>
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                        for="photo">Foto (Opsional)</label>

                                    @if($testimonial->photo)
                                        <div class="mb-3">
                                            <img src="{{ Storage::url($testimonial->photo) }}" alt="{{ $testimonial->name }}"
                                                class="w-20 h-20 rounded-full object-cover border-2 border-gray-200 dark:border-gray-700">
                                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Foto saat ini</p>
                                        </div>
                                    @endif

                                    <input
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100 @error('photo') border-red-500 @enderror"
                                        type="file" id="photo" name="photo" accept="image/*">
                                    @error('photo')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format: JPG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah foto</p>
                                </div>

                                <div class="mb-6">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="is_active" name="is_active" value="1"
                                            {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}
                                            class="w-4 h-4 text-violet-600 bg-gray-100 border-gray-300 rounded focus:ring-violet-500 dark:focus:ring-violet-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="is_active"
                                            class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-100">
                                            Aktif
                                        </label>
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <button type="submit"
                                        class="btn bg-violet-500 text-white hover:bg-violet-600 focus:ring focus:ring-violet-500/30 px-6 py-2 rounded">
                                        Perbarui
                                    </button>
                                    <a href="{{ route('index.testimonial') }}"
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
