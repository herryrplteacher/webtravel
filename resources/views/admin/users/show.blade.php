@extends('admin.master')

@section('title')
    <title>Detail User</title>
@endsection

@section('content')
    <div class="min-h-screen page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 pb-6">
                <div class="md:flex items-center justify-between px-[2px]">
                    <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">
                        Detail User</h4>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                            <li class="inline-flex items-center">
                                <a href="{{ route('index.user') }}"
                                    class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                    User
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center rtl:mr-2">
                                    <i
                                        class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                    <span
                                        class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100">Detail
                                        User</span>
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
                                    Informasi User
                                </h6>
                                <a href="{{ route('edit.user', $user->id) }}"
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
                                        <td class="py-3 px-4 dark:text-zinc-100">{{ $user->id }}</td>
                                    </tr>
                                    <tr class="border-b border-gray-100 dark:border-zinc-600">
                                        <td class="py-3 px-4 font-medium text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-zinc-700">
                                            Nama</td>
                                        <td class="py-3 px-4 dark:text-zinc-100"><strong>{{ $user->name }}</strong></td>
                                    </tr>
                                    <tr class="border-b border-gray-100 dark:border-zinc-600">
                                        <td class="py-3 px-4 font-medium text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-zinc-700">
                                            Email</td>
                                        <td class="py-3 px-4 dark:text-zinc-100">{{ $user->email }}</td>
                                    </tr>
                                    <tr class="border-b border-gray-100 dark:border-zinc-600">
                                        <td class="py-3 px-4 font-medium text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-zinc-700">
                                            Role</td>
                                        <td class="py-3 px-4 dark:text-zinc-100">
                                            @if ($user->role == 'owner')
                                                <span
                                                    class="px-2 py-1 text-xs font-semibold text-purple-800 bg-purple-100 rounded dark:bg-purple-900 dark:text-purple-100">Owner</span>
                                            @elseif($user->role == 'admin')
                                                <span
                                                    class="px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded dark:bg-blue-900 dark:text-blue-100">Admin</span>
                                            @else
                                                <span
                                                    class="px-2 py-1 text-xs font-semibold text-gray-800 bg-gray-100 rounded dark:bg-gray-600 dark:text-gray-100">Editor</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100 dark:border-zinc-600">
                                        <td class="py-3 px-4 font-medium text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-zinc-700">
                                            Status</td>
                                        <td class="py-3 px-4 dark:text-zinc-100">
                                            @if ($user->is_active)
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
                                        <td class="py-3 px-4 font-medium text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-zinc-700">
                                            Email Verified</td>
                                        <td class="py-3 px-4 dark:text-zinc-100">
                                            @if ($user->email_verified_at)
                                                <span
                                                    class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded dark:bg-green-900 dark:text-green-100">Verified</span>
                                                <br>
                                                <small
                                                    class="text-gray-500 dark:text-gray-400">{{ $user->email_verified_at->format('d M Y H:i') }}</small>
                                            @else
                                                <span
                                                    class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-100 rounded dark:bg-yellow-900 dark:text-yellow-100">Not
                                                    Verified</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100 dark:border-zinc-600">
                                        <td class="py-3 px-4 font-medium text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-zinc-700">
                                            Last Login</td>
                                        <td class="py-3 px-4 dark:text-zinc-100">
                                            @if ($user->last_login_at)
                                                {{ $user->last_login_at->format('d M Y H:i') }}
                                                <br>
                                                <small
                                                    class="text-gray-500 dark:text-gray-400">({{ $user->last_login_at->diffForHumans() }})</small>
                                            @else
                                                <span class="text-gray-400 dark:text-gray-500">Belum pernah login</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100 dark:border-zinc-600">
                                        <td class="py-3 px-4 font-medium text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-zinc-700">
                                            Dibuat</td>
                                        <td class="py-3 px-4 dark:text-zinc-100">
                                            {{ $user->created_at->format('d M Y H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 font-medium text-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-zinc-700">
                                            Diperbarui</td>
                                        <td class="py-3 px-4 dark:text-zinc-100">
                                            {{ $user->updated_at->format('d M Y H:i:s') }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="flex justify-between mt-6">
                                <a href="{{ route('index.user') }}"
                                    class="btn bg-gray-200 text-gray-700 hover:bg-gray-300 focus:ring focus:ring-gray-300/30 px-6 py-2 rounded dark:bg-zinc-600 dark:text-gray-100 dark:hover:bg-zinc-700">
                                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                                </a>
                                <div class="flex gap-2">
                                    <a href="{{ route('edit.user', $user->id) }}"
                                        class="btn bg-yellow-500 text-white hover:bg-yellow-600 focus:ring focus:ring-yellow-500/30 px-6 py-2 rounded">
                                        <i class="fas fa-edit mr-2"></i> Edit
                                    </a>
                                    <form action="{{ route('destroy.user', $user->id) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Yakin ingin menghapus user ini?')">
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
