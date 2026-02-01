@extends('admin.master')

@section('title')
    <title>Tambah WhatsApp Lead</title>
@endsection

@section('content')
    <div class="min-h-screen page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 pb-6">
                <div class="md:flex items-center justify-between px-[2px]">
                    <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">
                        Tambah WhatsApp Lead</h4>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                            <li class="inline-flex items-center">
                                <a href="{{ route('index.wa_lead') }}"
                                    class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                    WhatsApp Leads
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center rtl:mr-2">
                                    <i
                                        class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                    <span
                                        class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100">Tambah
                                        Lead</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- content start -->
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-8">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                            <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100 font-semibold">
                                Form Tambah WhatsApp Lead
                            </h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.wa_lead') }}" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                        for="customer_name">
                                        Nama Customer
                                    </label>
                                    <input
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('customer_name') border-red-500 @enderror"
                                        type="text" id="customer_name" name="customer_name"
                                        value="{{ old('customer_name') }}" placeholder="Masukkan nama customer"
                                        maxlength="120">
                                    @error('customer_name')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100" for="phone">
                                        Nomor WhatsApp
                                    </label>
                                    <input
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('phone') border-red-500 @enderror"
                                        type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                        placeholder="Contoh: 08123456789 atau +628123456789" maxlength="30">
                                    @error('phone')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100" for="route_id">
                                        Route (Opsional)
                                    </label>
                                    <select
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100 @error('route_id') border-red-500 @enderror"
                                        id="route_id" name="route_id">
                                        <option value="">Tidak terkait route tertentu</option>
                                        @foreach ($routes as $route)
                                            <option value="{{ $route->id }}"
                                                {{ old('route_id') == $route->id ? 'selected' : '' }}>
                                                {{ $route->title }} ({{ $route->fromLocation?->name }} →
                                                {{ $route->toLocation?->name }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('route_id')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100" for="source">
                                        Sumber Lead <span class="text-red-500">*</span>
                                    </label>
                                    <select
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100 @error('source') border-red-500 @enderror"
                                        id="source" name="source" required>
                                        <option value="">Pilih Sumber Lead</option>
                                        <option value="home" {{ old('source') == 'home' ? 'selected' : '' }}>Halaman Home
                                        </option>
                                        <option value="detail" {{ old('source') == 'detail' ? 'selected' : '' }}>Halaman
                                            Detail</option>
                                        <option value="promo" {{ old('source') == 'promo' ? 'selected' : '' }}>Halaman Promo
                                        </option>
                                        <option value="other" {{ old('source', 'other') == 'other' ? 'selected' : '' }}>
                                            Lainnya</option>
                                    </select>
                                    @error('source')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                        for="clicked_at">
                                        Waktu Klik (Opsional)
                                    </label>
                                    <input
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('clicked_at') border-red-500 @enderror"
                                        type="datetime-local" id="clicked_at" name="clicked_at"
                                        value="{{ old('clicked_at') }}">
                                    @error('clicked_at')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Kosongkan untuk menggunakan waktu
                                        sekarang</p>
                                </div>

                                <div class="flex gap-3">
                                    <button type="submit"
                                        class="btn bg-violet-500 text-white hover:bg-violet-600 focus:ring focus:ring-violet-500/30 px-6 py-2 rounded">
                                        Simpan
                                    </button>
                                    <a href="{{ route('index.wa_lead') }}"
                                        class="btn bg-gray-200 text-gray-700 hover:bg-gray-300 focus:ring focus:ring-gray-300/30 px-6 py-2 rounded dark:bg-zinc-600 dark:text-gray-100 dark:hover:bg-zinc-700">
                                        Batal
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-4">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                            <h6 class="mb-0 text-gray-700 text-15 dark:text-gray-100 font-semibold">
                                Info
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="space-y-3">
                                <div class="text-sm text-gray-600 dark:text-gray-300">
                                    <p class="font-semibold mb-2">Tips Input Lead:</p>
                                    <ul class="list-disc list-inside space-y-1">
                                        <li>Nama customer bersifat opsional</li>
                                        <li>Format nomor: 08xxx atau +628xxx</li>
                                        <li>Route boleh kosong untuk lead umum</li>
                                        <li>Pilih sumber yang sesuai</li>
                                        <li>Waktu klik otomatis jika dikosongkan</li>
                                    </ul>
                                </div>

                                <div class="mt-4 p-3 bg-blue-50 dark:bg-blue-900/20 rounded">
                                    <p class="text-xs text-blue-800 dark:text-blue-200">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        <strong>Catatan:</strong> Lead biasanya tercatat otomatis dari website. Form ini
                                        untuk input manual jika diperlukan.
                                    </p>
                                </div>
                            </div>
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
