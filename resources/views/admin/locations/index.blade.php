@extends('admin.master')

@section('title')
    <title>Halaman Lokasi</title>
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
                        Halaman Lokasi</h4>
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
                                    <a href="{{ route('index.location') }}"
                                        class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white">
                                        Lokasi</a>
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
                                    Daftar Lokasi
                                </h6>
                                <a href="{{ route('create.location') }}"
                                    class="btn bg-violet-500 text-white hover:bg-violet-600 focus:ring focus:ring-violet-500/30 px-4 py-2 rounded inline-flex items-center">
                                    <i class="fas fa-plus mr-2"></i> Tambah Lokasi
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
                                                Nama Lokasi
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Tipe
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($locations as $item)
                                            <tr
                                                class="bg-white border-b border-gray-50 dark:bg-zinc-700 dark:border-zinc-600">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    {{ $item->name }}
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    <span
                                                        class="px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded dark:bg-blue-900 dark:text-blue-100">
                                                        {{ $item->getTypeLabel() }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @if ($item->is_active)
                                                        <span
                                                            class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded dark:bg-green-900 dark:text-green-100">Aktif</span>
                                                    @else
                                                        <span
                                                            class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded dark:bg-red-900 dark:text-red-100">Tidak
                                                            Aktif</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    <div class="flex gap-2">
                                                        <a href="{{ route('edit.location', $item->id) }}"
                                                            class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('destroy.location', $item->id) }}"
                                                            method="POST" class="inline"
                                                            onsubmit="return confirm('Yakin ingin menghapus lokasi ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5"
                                                    class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                                    <div class="flex flex-col items-center">
                                                        <i class="fas fa-inbox text-4xl mb-2"></i>
                                                        <p>Belum ada data lokasi</p>
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
