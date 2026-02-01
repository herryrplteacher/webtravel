@extends('admin.master')

@section('title')
    <title>Detail WhatsApp Lead</title>
@endsection

@section('content')
    <div class="min-h-screen page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 pb-6">
                <div class="md:flex items-center justify-between px-[2px]">
                    <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">
                        Detail WhatsApp Lead</h4>
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
                                        class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100">Detail
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
                            <div class="flex justify-between items-center">
                                <h6 class="mb-0 text-gray-700 text-15 dark:text-gray-100 font-semibold">
                                    Informasi Lead
                                </h6>
                                <a href="{{ route('index.wa_lead') }}"
                                    class="btn bg-gray-200 text-gray-700 hover:bg-gray-300 px-4 py-2 rounded dark:bg-zinc-600 dark:text-gray-100 dark:hover:bg-zinc-700">
                                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="space-y-4">
                                <div class="border-b border-gray-100 dark:border-zinc-600 pb-4">
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                        Nama Customer
                                    </label>
                                    <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                        {{ $waLead->customer_name ?: 'Guest' }}
                                    </p>
                                </div>

                                <div class="border-b border-gray-100 dark:border-zinc-600 pb-4">
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                        Nomor WhatsApp
                                    </label>
                                    @if ($waLead->phone)
                                        <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $waLead->phone) }}"
                                                target="_blank"
                                                class="text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-300">
                                                <i class="fab fa-whatsapp mr-2"></i>{{ $waLead->phone }}
                                            </a>
                                        </p>
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $waLead->phone) }}"
                                            target="_blank"
                                            class="inline-block mt-2 btn bg-green-500 text-white hover:bg-green-600 px-4 py-2 rounded">
                                            <i class="fab fa-whatsapp mr-2"></i>Hubungi via WhatsApp
                                        </a>
                                    @else
                                        <p class="text-gray-400">Tidak ada nomor telepon</p>
                                    @endif
                                </div>

                                @if ($waLead->route)
                                    <div class="border-b border-gray-100 dark:border-zinc-600 pb-4">
                                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                            Route yang Diminati
                                        </label>
                                        <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                            {{ $waLead->route->title }}
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                            <i class="fas fa-route mr-2"></i>
                                            {{ $waLead->route->fromLocation?->name ?? '-' }} →
                                            {{ $waLead->route->toLocation?->name ?? '-' }}
                                        </p>
                                        @if ($waLead->route->price_from)
                                            <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                                <i class="fas fa-money-bill-wave mr-2"></i>
                                                Harga mulai dari: Rp
                                                {{ number_format($waLead->route->price_from, 0, ',', '.') }}
                                            </p>
                                        @endif
                                    </div>
                                @else
                                    <div class="border-b border-gray-100 dark:border-zinc-600 pb-4">
                                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                            Route
                                        </label>
                                        <p class="text-gray-400">Tidak terkait route tertentu</p>
                                    </div>
                                @endif

                                <div class="border-b border-gray-100 dark:border-zinc-600 pb-4">
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                        Sumber Lead
                                    </label>
                                    <p class="text-gray-800 dark:text-gray-100">
                                        <span
                                            class="px-3 py-1 text-sm rounded
                                            @if ($waLead->source === 'home') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-100
                                            @elseif($waLead->source === 'detail') bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-100
                                            @elseif($waLead->source === 'promo') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-100
                                            @else bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100 @endif">
                                            {{ $waLead->getSourceLabel() }}
                                        </span>
                                    </p>
                                </div>

                                <div class="border-b border-gray-100 dark:border-zinc-600 pb-4">
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                        Waktu Klik
                                    </label>
                                    <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                        <i class="far fa-calendar-alt mr-2 text-blue-600"></i>
                                        {{ $waLead->clicked_at?->format('d F Y, H:i') }} WIB
                                    </p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                        {{ $waLead->clicked_at?->diffForHumans() }}
                                    </p>
                                </div>

                                <div class="border-b border-gray-100 dark:border-zinc-600 pb-4">
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                        Data Tercatat
                                    </label>
                                    <p class="text-gray-800 dark:text-gray-100">
                                        {{ $waLead->created_at?->format('d F Y, H:i') ?? '-' }}
                                    </p>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                        Terakhir Diupdate
                                    </label>
                                    <p class="text-gray-800 dark:text-gray-100">
                                        {{ $waLead->updated_at?->format('d F Y, H:i') ?? '-' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-4">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                            <h6 class="mb-0 text-gray-700 text-15 dark:text-gray-100 font-semibold">
                                Aksi
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="space-y-3">
                                @if ($waLead->phone)
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $waLead->phone) }}"
                                        target="_blank"
                                        class="w-full btn bg-green-500 text-white hover:bg-green-600 px-4 py-2 rounded inline-flex items-center justify-center">
                                        <i class="fab fa-whatsapp mr-2"></i> Chat WhatsApp
                                    </a>
                                @endif

                                <form action="{{ route('destroy.wa_lead', $waLead->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus lead ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full btn bg-red-500 text-white hover:bg-red-600 px-4 py-2 rounded inline-flex items-center justify-center">
                                        <i class="fas fa-trash mr-2"></i> Hapus Lead
                                    </button>
                                </form>

                                <a href="{{ route('index.wa_lead') }}"
                                    class="w-full btn bg-gray-200 text-gray-700 hover:bg-gray-300 px-4 py-2 rounded inline-flex items-center justify-center dark:bg-zinc-600 dark:text-gray-100 dark:hover:bg-zinc-700">
                                    <i class="fas fa-list mr-2"></i> Lihat Semua Leads
                                </a>
                            </div>
                        </div>
                    </div>

                    @if ($waLead->route)
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600 mt-4">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <h6 class="mb-0 text-gray-700 text-15 dark:text-gray-100 font-semibold">
                                    Info Route
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="text-sm space-y-2">
                                    <p class="text-gray-600 dark:text-gray-300">
                                        <strong>Service:</strong><br>
                                        {{ $waLead->route->service?->name ?? '-' }}
                                    </p>
                                    @if ($waLead->route->duration)
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <strong>Durasi:</strong><br>
                                            {{ $waLead->route->duration }}
                                        </p>
                                    @endif
                                    @if ($waLead->route->short_desc)
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <strong>Deskripsi:</strong><br>
                                            {{ Str::limit($waLead->route->short_desc, 100) }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- content end -->

            <!-- Footer Start -->
            @include('admin.components.footer')
            <!-- end Footer -->
        </div>
    </div>
@endsection
