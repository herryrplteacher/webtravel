@extends('admin.master')

@section('title')
    <title>Halaman Route</title>
@endsection

@section('content')
    <div class="min-h-screen page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            @if (session('success'))
                <div
                    class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded dark:bg-green-900 dark:border-green-700 dark:text-green-100">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 pb-6">
                <div class="md:flex items-center justify-between px-[2px]">
                    <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">
                        Halaman Route</h4>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                            <li class="inline-flex items-center">
                                <a href="#"
                                    class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                    Halaman Utama
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center rtl:mr-2">
                                    <i
                                        class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                    <a href="{{ route('index.route') }}"
                                        class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white">Starter
                                        Halaman Route</a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- content start -->
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 xl:col-span-12">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                            <div class="flex justify-between items-center">
                                <h6 class="mb-0 text-gray-700 text-15 dark:text-gray-100 font-semibold">
                                    Daftar Route
                                </h6>
                                <a href="{{ route('create.route') }}"
                                    class="btn bg-violet-500 text-white hover:bg-violet-600 focus:ring focus:ring-violet-500/30 px-4 py-2 rounded inline-flex items-center">
                                    <i class="fas fa-plus mr-2"></i> Tambah Route
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="relative overflow-x-auto w-full">
                                <table class="text-sm text-left text-gray-500 w-full">
                                    <thead class="text-sm text-gray-700 dark:text-gray-100">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                #
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Judul
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Service
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Rute
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Harga Dari
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Durasi
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Tools
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($routes as $item)
                                            <tr
                                                class="bg-white border-b border-gray-50 dark:bg-zinc-700 dark:border-zinc-600">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    <div class="flex items-start gap-3">
                                                        @if ($item->cover_image)
                                                            <img src="{{ asset('storage/' . $item->cover_image) }}"
                                                                alt="{{ $item->title }}"
                                                                class="w-16 h-12 object-cover rounded">
                                                        @else
                                                            <div
                                                                class="w-16 h-12 bg-gray-200 dark:bg-zinc-600 rounded flex items-center justify-center">
                                                                <i data-feather="navigation"
                                                                    class="h-6 w-6 text-gray-400"></i>
                                                            </div>
                                                        @endif
                                                        <div>
                                                            <strong>{{ $item->title }}</strong>
                                                            @if ($item->short_desc)
                                                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                                                    {{ Str::limit($item->short_desc, 50) }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    <span
                                                        class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded dark:bg-blue-900 dark:text-blue-100">
                                                        {{ $item->service?->name ?? '-' }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    <div class="flex items-center gap-2">
                                                        <span>{{ $item->fromLocation?->name ?? '-' }}</span>
                                                        <i data-feather="arrow-right" class="h-4 w-4"></i>
                                                        <span>{{ $item->toLocation?->name ?? '-' }}</span>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    Rp {{ number_format($item->price_from, 0, ',', '.') }}
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    {{ $item->duration ?? '-' }}
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @if ($item->is_active)
                                                        <span
                                                            class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded dark:bg-green-900 dark:text-green-100">
                                                            <i data-feather="check-circle"
                                                                class="inline h-3 w-3 mr-1"></i>Aktif
                                                        </span>
                                                    @else
                                                        <span
                                                            class="px-2 py-1 text-xs font-semibold text-gray-800 bg-gray-100 rounded dark:bg-gray-600 dark:text-gray-100">
                                                            <i data-feather="x-circle"
                                                                class="inline h-3 w-3 mr-1"></i>Nonaktif
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    <div class="flex gap-2">
                                                        <a href="{{ route('show.route', $item->id) }}"
                                                            class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300"
                                                            title="Lihat Detail">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('edit.route', $item->id) }}"
                                                            class="text-yellow-600 hover:text-yellow-800 dark:text-yellow-400 dark:hover:text-yellow-300"
                                                            title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('destroy.route', $item->id) }}"
                                                            method="POST" class="inline"
                                                            onsubmit="return confirm('Yakin ingin menghapus route ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300"
                                                                title="Hapus">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8"
                                                    class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                                    <div class="flex flex-col items-center">
                                                        <i class="fas fa-inbox text-4xl mb-2"></i>
                                                        <p>Belum ada data route</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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
