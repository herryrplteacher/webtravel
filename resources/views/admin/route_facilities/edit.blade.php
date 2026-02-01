@extends('admin.master')

@section('title')
    <title>Edit Fasilitas Route</title>
@endsection

@section('content')
    <div class="min-h-screen page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 pb-6">
                <div class="md:flex items-center justify-between px-[2px]">
                    <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">
                        Edit Fasilitas Route</h4>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                            <li class="inline-flex items-center">
                                <a href="{{ route('index.route_facilitie') }}"
                                    class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                    Fasilitas Route
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center rtl:mr-2">
                                    <i
                                        class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                    <span
                                        class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100">Edit
                                        Fasilitas</span>
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
                                Form Edit Fasilitas Route
                            </h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.route_facilitie', $routeFacilitie->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100" for="route_id">
                                        Route <span class="text-red-500">*</span>
                                    </label>
                                    <select
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100 @error('route_id') border-red-500 @enderror"
                                        id="route_id" name="route_id" required>
                                        <option value="">Pilih Route</option>
                                        @foreach ($routes as $route)
                                            <option value="{{ $route->id }}"
                                                {{ old('route_id', $routeFacilitie->route_id) == $route->id ? 'selected' : '' }}>
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
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100" for="label">
                                        Label Fasilitas <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('label') border-red-500 @enderror"
                                        type="text" id="label" name="label"
                                        value="{{ old('label', $routeFacilitie->label) }}"
                                        placeholder="Contoh: AC, WiFi, Toilet, Snack, dll" maxlength="100" required>
                                    @error('label')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Maksimal 100 karakter</p>
                                </div>

                                <div class="flex gap-3">
                                    <button type="submit"
                                        class="btn bg-violet-500 text-white hover:bg-violet-600 focus:ring focus:ring-violet-500/30 px-6 py-2 rounded">
                                        Update
                                    </button>
                                    <a href="{{ route('index.route_facilitie') }}"
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
                                    <p class="font-semibold mb-2">Contoh Fasilitas:</p>
                                    <ul class="list-disc list-inside space-y-1">
                                        <li>AC / Non AC</li>
                                        <li>WiFi Gratis</li>
                                        <li>Toilet</li>
                                        <li>Snack & Minuman</li>
                                        <li>TV / Musik</li>
                                        <li>Stopkontak / USB Port</li>
                                        <li>Kursi Reclining</li>
                                        <li>Bantal & Selimut</li>
                                    </ul>
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
