@extends('admin.master')

@section('title')
    <title>Detail Setting</title>
@endsection

@section('content')
    <div class="min-h-screen page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 pb-6">
                <div class="md:flex items-center justify-between px-[2px]">
                    <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">
                        Detail Setting</h4>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                            <li class="inline-flex items-center">
                                <a href="{{ route('index.setting') }}"
                                    class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                    Setting
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center rtl:mr-2">
                                    <i
                                        class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                    <span
                                        class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100">Detail
                                        Setting</span>
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
                            <div class="flex justify-between items-center">
                                <h6 class="mb-0 text-gray-700 text-15 dark:text-gray-100 font-semibold">
                                    Informasi Setting
                                </h6>
                                <div class="flex gap-2">
                                    <a href="{{ route('edit.setting', $setting->id) }}"
                                        class="btn bg-yellow-500 text-white hover:bg-yellow-600 focus:ring focus:ring-yellow-500/30 px-4 py-2 rounded inline-flex items-center">
                                        <i class="fas fa-edit mr-2"></i> Edit
                                    </a>
                                    <a href="{{ route('index.setting') }}"
                                        class="btn bg-gray-200 text-gray-700 hover:bg-gray-300 focus:ring focus:ring-gray-300/30 px-4 py-2 rounded dark:bg-zinc-600 dark:text-gray-100 dark:hover:bg-zinc-700">
                                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="grid grid-cols-1 gap-4">
                                <div class="border-b border-gray-200 dark:border-zinc-600 pb-4">
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Key Name</p>
                                    <p class="text-base font-semibold text-gray-800 dark:text-gray-100">
                                        {{ $setting->key_name }}</p>
                                </div>

                                <div class="border-b border-gray-200 dark:border-zinc-600 pb-4">
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Value</p>
                                    <div class="text-base text-gray-800 dark:text-gray-100 whitespace-pre-wrap">
                                        {{ $setting->value ?? '-' }}
                                    </div>
                                </div>

                                <div class="border-b border-gray-200 dark:border-zinc-600 pb-4">
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Dibuat Pada</p>
                                    <p class="text-base text-gray-800 dark:text-gray-100">
                                        {{ $setting->created_at->format('d M Y H:i:s') }}
                                        <span class="text-sm text-gray-500 dark:text-gray-400">
                                            ({{ $setting->created_at->diffForHumans() }})
                                        </span>
                                    </p>
                                </div>

                                <div class="pb-4">
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Terakhir Diupdate</p>
                                    <p class="text-base text-gray-800 dark:text-gray-100">
                                        {{ $setting->updated_at->format('d M Y H:i:s') }}
                                        <span class="text-sm text-gray-500 dark:text-gray-400">
                                            ({{ $setting->updated_at->diffForHumans() }})
                                        </span>
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
