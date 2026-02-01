@extends('admin.master')

@section('title')
    <title>Tambah Route</title>
@endsection

@section('content')
    <div class="min-h-screen page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 pb-6">
                <div class="md:flex items-center justify-between px-[2px]">
                    <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">
                        Tambah Route</h4>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                            <li class="inline-flex items-center">
                                <a href="{{ route('index.route') }}"
                                    class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                    Route
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center rtl:mr-2">
                                    <i
                                        class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                    <span
                                        class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100">Tambah
                                        Route</span>
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
                                Form Tambah Route
                            </h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.route') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100" for="service_id">
                                        Service <span class="text-red-500">*</span>
                                    </label>
                                    <select
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100 @error('service_id') border-red-500 @enderror"
                                        id="service_id" name="service_id" required>
                                        <option value="">Pilih Service</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}"
                                                {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                                {{ $service->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100" for="title">
                                        Judul Route <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('title') border-red-500 @enderror"
                                        type="text" id="title" name="title" value="{{ old('title') }}"
                                        placeholder="Masukkan judul route" maxlength="200" required>
                                    @error('title')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                            for="from_location_id">
                                            Lokasi Asal <span class="text-red-500">*</span>
                                        </label>
                                        <select
                                            class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100 @error('from_location_id') border-red-500 @enderror"
                                            id="from_location_id" name="from_location_id" required>
                                            <option value="">Pilih Lokasi Asal</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}"
                                                    {{ old('from_location_id') == $location->id ? 'selected' : '' }}>
                                                    {{ $location->name }} ({{ $location->getTypeLabel() }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('from_location_id')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                            for="to_location_id">
                                            Lokasi Tujuan <span class="text-red-500">*</span>
                                        </label>
                                        <select
                                            class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100 @error('to_location_id') border-red-500 @enderror"
                                            id="to_location_id" name="to_location_id" required>
                                            <option value="">Pilih Lokasi Tujuan</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}"
                                                    {{ old('to_location_id') == $location->id ? 'selected' : '' }}>
                                                    {{ $location->name }} ({{ $location->getTypeLabel() }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('to_location_id')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                            for="price_from">
                                            Harga Mulai Dari
                                        </label>
                                        <input
                                            class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('price_from') border-red-500 @enderror"
                                            type="number" id="price_from" name="price_from"
                                            value="{{ old('price_from', 0) }}" placeholder="0" min="0">
                                        @error('price_from')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                            for="duration">
                                            Durasi Perjalanan
                                        </label>
                                        <input
                                            class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('duration') border-red-500 @enderror"
                                            type="text" id="duration" name="duration" value="{{ old('duration') }}"
                                            placeholder="Contoh: 3 jam" maxlength="50">
                                        @error('duration')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100" for="short_desc">
                                        Deskripsi Singkat
                                    </label>
                                    <textarea
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('short_desc') border-red-500 @enderror"
                                        id="short_desc" name="short_desc" rows="3" placeholder="Masukkan deskripsi singkat route">{{ old('short_desc') }}</textarea>
                                    @error('short_desc')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                        for="cover_image">
                                        Gambar Cover
                                    </label>
                                    <input
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100 @error('cover_image') border-red-500 @enderror"
                                        type="file" id="cover_image" name="cover_image" accept="image/*">
                                    @error('cover_image')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format: JPEG, JPG, PNG, WEBP.
                                        Maksimal 2MB</p>
                                </div>

                                <div class="mb-6">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="is_active" name="is_active" value="1"
                                            {{ old('is_active', true) ? 'checked' : '' }}
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
                                        Simpan
                                    </button>
                                    <a href="{{ route('index.route') }}"
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
