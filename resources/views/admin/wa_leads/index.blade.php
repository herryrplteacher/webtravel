@extends('admin.master')

@section('title')
    <title>Halaman WhatsApp Leads</title>
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
                        Halaman WhatsApp Leads</h4>
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
                                    <a href="{{ route('index.wa_lead') }}"
                                        class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white">Starter
                                        Halaman WhatsApp Leads</a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center">
                                    <i class="fab fa-whatsapp text-2xl text-green-600 dark:text-green-400"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-500 dark:text-gray-400">Total Leads</p>
                                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $leads->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center">
                                    <i class="fas fa-home text-2xl text-blue-600 dark:text-blue-400"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-500 dark:text-gray-400">Dari Home</p>
                                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                                    {{ $leads->where('source', 'home')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center">
                                    <i class="fas fa-info-circle text-2xl text-purple-600 dark:text-purple-400"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-500 dark:text-gray-400">Dari Detail</p>
                                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                                    {{ $leads->where('source', 'detail')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900 rounded-full flex items-center justify-center">
                                    <i class="fas fa-tags text-2xl text-yellow-600 dark:text-yellow-400"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-500 dark:text-gray-400">Dari Promo</p>
                                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                                    {{ $leads->where('source', 'promo')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- content start -->
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 xl:col-span-12">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                            <div class="flex justify-between items-center">
                                <h6 class="mb-0 text-gray-700 text-15 dark:text-gray-100 font-semibold">
                                    Daftar WhatsApp Leads
                                </h6>
                                <a href="{{ route('create.wa_lead') }}"
                                    class="btn bg-violet-500 text-white hover:bg-violet-600 focus:ring focus:ring-violet-500/30 px-4 py-2 rounded inline-flex items-center">
                                    <i class="fas fa-plus mr-2"></i> Tambah Lead
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
                                                Nama Customer
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                No. WhatsApp
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Route
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Sumber
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Waktu Klik
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Tools
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($leads as $item)
                                            <tr
                                                class="bg-white border-b border-gray-50 dark:bg-zinc-700 dark:border-zinc-600">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    <strong>{{ $item->customer_name ?: 'Guest' }}</strong>
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @if ($item->phone)
                                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->phone) }}"
                                                            target="_blank"
                                                            class="text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-300">
                                                            <i class="fab fa-whatsapp mr-1"></i>{{ $item->phone }}
                                                        </a>
                                                    @else
                                                        <span class="text-gray-400">-</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    @if ($item->route)
                                                        <strong>{{ $item->route->title }}</strong>
                                                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                                            {{ $item->route->fromLocation?->name ?? '-' }} →
                                                            {{ $item->route->toLocation?->name ?? '-' }}
                                                        </div>
                                                    @else
                                                        <span class="text-gray-400">-</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    <span
                                                        class="px-2 py-1 text-xs rounded
                                                        @if ($item->source === 'home') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-100
                                                        @elseif($item->source === 'detail') bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-100
                                                        @elseif($item->source === 'promo') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-100
                                                        @else bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100 @endif">
                                                        {{ $item->getSourceLabel() }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    <div>{{ $item->clicked_at?->format('d M Y') }}</div>
                                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                                        {{ $item->clicked_at?->format('H:i') }} WIB
                                                    </div>
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    <div class="flex gap-2">
                                                        <a href="{{ route('show.wa_lead', $item->id) }}"
                                                            class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300"
                                                            title="Lihat Detail">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <form action="{{ route('destroy.wa_lead', $item->id) }}"
                                                            method="POST" class="inline"
                                                            onsubmit="return confirm('Yakin ingin menghapus lead ini?')">
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
                                                <td colspan="7"
                                                    class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                                    <div class="flex flex-col items-center">
                                                        <i class="fab fa-whatsapp text-4xl mb-2"></i>
                                                        <p>Belum ada data WhatsApp leads</p>
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
