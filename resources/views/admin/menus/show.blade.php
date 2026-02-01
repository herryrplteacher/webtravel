@extends('admin.master')

@section('title')
    <title>Detail Menu</title>
@endsection

@section('content')
    <div class="min-h-screen page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 pb-6">
                <div class="md:flex items-center justify-between px-[2px]">
                    <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">
                        Detail Menu</h4>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                            <li class="inline-flex items-center">
                                <a href="{{ route('index.menu') }}"
                                    class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                    Menu
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center rtl:mr-2">
                                    <i
                                        class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                    <span
                                        class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100">Detail
                                        Menu</span>
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
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100 font-semibold">
                                    Informasi Menu
                                </h6>
                                <a href="{{ route('edit.menu', $menu->id) }}"
                                    class="btn bg-yellow-500 text-white hover:bg-yellow-600 focus:ring focus:ring-yellow-500/30 px-4 py-2 rounded inline-flex items-center">
                                    <i class="fas fa-edit mr-2"></i> Edit
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="w-full text-sm">
                                <tbody>
                                    <tr class="border-b border-gray-100 dark:border-zinc-600">
                                        <td class="py-3 px-4 font-medium text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-zinc-700"
                                            width="30%">ID</td>
                                        <td class="py-3 px-4 dark:text-zinc-100">{{ $menu->id }}</td>
                                    </tr>
                                    <tr class="border-b border-gray-100 dark:border-zinc-600">
                                        <td
                                            class="py-3 px-4 font-medium text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-zinc-700">
                                            Judul Menu</td>
                                        <td class="py-3 px-4 dark:text-zinc-100"><strong>{{ $menu->title }}</strong></td>
                                    </tr>
                                    <tr class="border-b border-gray-100 dark:border-zinc-600">
                                        <td
                                            class="py-3 px-4 font-medium text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-zinc-700">
                                            URL</td>
                                        <td class="py-3 px-4 dark:text-zinc-100">
                                            @if ($menu->url)
                                                <code
                                                    class="text-xs bg-gray-100 dark:bg-zinc-600 px-2 py-1 rounded">{{ $menu->url }}</code>
                                            @else
                                                <span class="text-gray-400 dark:text-gray-500">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100 dark:border-zinc-600">
                                        <td
                                            class="py-3 px-4 font-medium text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-zinc-700">
                                            Parent Menu</td>
                                        <td class="py-3 px-4 dark:text-zinc-100">
                                            @if ($menu->parent)
                                                <span
                                                    class="px-2 py-1 text-xs font-semibold text-gray-800 bg-gray-100 rounded dark:bg-gray-600 dark:text-gray-100">{{ $menu->parent->title }}</span>
                                                <a href="{{ route('show.menu', $menu->parent->id) }}"
                                                    class="ml-2 text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                                    Lihat Detail
                                                </a>
                                            @else
                                                <span class="text-gray-500 dark:text-gray-400">Menu Utama (Tidak ada
                                                    parent)</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100 dark:border-zinc-600">
                                        <td
                                            class="py-3 px-4 font-medium text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-zinc-700">
                                            Urutan</td>
                                        <td class="py-3 px-4 dark:text-zinc-100">{{ $menu->sort_order }}</td>
                                    </tr>
                                    <tr class="border-b border-gray-100 dark:border-zinc-600">
                                        <td
                                            class="py-3 px-4 font-medium text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-zinc-700">
                                            Status</td>
                                        <td class="py-3 px-4 dark:text-zinc-100">
                                            @if ($menu->is_active)
                                                <span
                                                    class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded dark:bg-green-900 dark:text-green-100">Aktif</span>
                                            @else
                                                <span
                                                    class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded dark:bg-red-900 dark:text-red-100">Tidak
                                                    Aktif</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100 dark:border-zinc-600">
                                        <td
                                            class="py-3 px-4 font-medium text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-zinc-700">
                                            Dibuat</td>
                                        <td class="py-3 px-4 dark:text-zinc-100">
                                            {{ $menu->created_at->format('d M Y H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="py-3 px-4 font-medium text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-zinc-700">
                                            Diperbarui</td>
                                        <td class="py-3 px-4 dark:text-zinc-100">
                                            {{ $menu->updated_at->format('d M Y H:i:s') }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            @if ($menu->children->isNotEmpty())
                                <div class="mt-6">
                                    <h6 class="mb-3 text-gray-700 text-15 dark:text-gray-100 font-semibold border-b pb-2">
                                        Submenu ({{ $menu->children->count() }})
                                    </h6>
                                    <div class="space-y-2">
                                        @foreach ($menu->children as $child)
                                            <div
                                                class="flex justify-between items-center p-3 bg-gray-50 dark:bg-zinc-700 rounded">
                                                <div class="flex-1">
                                                    <div class="font-medium text-gray-700 dark:text-gray-100">
                                                        {{ $child->title }}</div>
                                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                                        <code
                                                            class="bg-gray-100 dark:bg-zinc-600 px-2 py-1 rounded">{{ $child->url ?? '-' }}</code>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    @if ($child->is_active)
                                                        <span
                                                            class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded dark:bg-green-900 dark:text-green-100">Aktif</span>
                                                    @else
                                                        <span
                                                            class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded dark:bg-red-900 dark:text-red-100">Tidak
                                                            Aktif</span>
                                                    @endif
                                                    <a href="{{ route('show.menu', $child->id) }}"
                                                        class="btn bg-blue-500 text-white hover:bg-blue-600 focus:ring focus:ring-blue-500/30 px-3 py-1 rounded text-xs">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="flex justify-between mt-6">
                                <a href="{{ route('index.menu') }}"
                                    class="btn bg-gray-200 text-gray-700 hover:bg-gray-300 focus:ring focus:ring-gray-300/30 px-6 py-2 rounded dark:bg-zinc-600 dark:text-gray-100 dark:hover:bg-zinc-700">
                                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                                </a>
                                <div class="flex gap-2">
                                    <a href="{{ route('edit.menu', $menu->id) }}"
                                        class="btn bg-yellow-500 text-white hover:bg-yellow-600 focus:ring focus:ring-yellow-500/30 px-6 py-2 rounded">
                                        <i class="fas fa-edit mr-2"></i> Edit
                                    </a>
                                    <form action="{{ route('destroy.menu', $menu->id) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn bg-red-500 text-white hover:bg-red-600 focus:ring focus:ring-red-500/30 px-6 py-2 rounded">
                                            <i class="fas fa-trash mr-2"></i> Hapus
                                        </button>
                                    </form>
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
