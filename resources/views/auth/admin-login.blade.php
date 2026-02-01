<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login Admin - Web Travel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Web Travel Admin Panel" name="description">
    <meta content="Web Travel" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

    <!-- Tailwind CSS -->
    @include('admin.components.style')
</head>

<body data-mode="light" class="bg-slate-50 dark:bg-zinc-800">
    <div class="min-h-screen flex">
        <!-- Left Side - Background Image -->
        <div class="hidden lg:block lg:w-1/2 relative bg-cover bg-center"
            style="background-image: url('{{ asset('admin/assets/images/auth-bg.jpg') }}');">
            <div class="absolute inset-0 bg-violet-600/80 dark:bg-violet-900/80"></div>
            <div class="relative h-full flex flex-col justify-center items-center text-white px-12">
                <div class="text-center">
                    <h1 class="text-5xl font-bold mb-4">Web Travel</h1>
                    <p class="text-xl text-violet-100 mb-8">Sistem Manajemen Admin</p>
                    <div class="space-y-3">
                        <div class="flex items-center justify-center gap-3">
                            <i data-feather="shield" class="h-5 w-5"></i>
                            <span>Keamanan Terjamin</span>
                        </div>
                        <div class="flex items-center justify-center gap-3">
                            <i data-feather="users" class="h-5 w-5"></i>
                            <span>Role-Based Access Control</span>
                        </div>
                        <div class="flex items-center justify-center gap-3">
                            <i data-feather="activity" class="h-5 w-5"></i>
                            <span>Real-Time Monitoring</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center px-6 py-12">
            <div class="w-full max-w-md">
                <!-- Logo for Mobile -->
                <div class="lg:hidden text-center mb-8">
                    <h1 class="text-3xl font-bold text-violet-600 dark:text-violet-400 mb-2">Web Travel</h1>
                    <p class="text-gray-600 dark:text-gray-400">Admin Login Panel</p>
                </div>

                <!-- Card -->
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                        <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100 font-semibold">
                            <i data-feather="log-in" class="inline h-5 w-5 mr-2"></i>Login ke Dashboard
                        </h6>
                        <p class="text-gray-500 text-13 dark:text-gray-400">Masukkan kredensial Anda untuk melanjutkan
                        </p>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div
                                class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded dark:bg-green-900 dark:border-green-700 dark:text-green-100">
                                <i data-feather="check-circle" class="inline h-4 w-4 mr-1"></i>{{ session('status') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div
                                class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded dark:bg-red-900 dark:border-red-700 dark:text-red-100">
                                <i data-feather="alert-circle" class="inline h-4 w-4 mr-1"></i>{{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="mb-4">
                                <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100" for="email">
                                    Email
                                </label>
                                <input
                                    class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('email') border-red-500 @enderror"
                                    type="email" id="email" name="email" value="{{ old('email') }}"
                                    placeholder="Masukkan email Anda" required autofocus>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100" for="password">
                                    Password
                                </label>
                                <input
                                    class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('password') border-red-500 @enderror"
                                    type="password" id="password" name="password"
                                    placeholder="Masukkan password Anda" required>
                                @error('password')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-6">
                                <div class="flex items-center">
                                    <input type="checkbox" id="remember" name="remember"
                                        {{ old('remember') ? 'checked' : '' }}
                                        class="w-4 h-4 text-violet-600 bg-gray-100 border-gray-300 rounded focus:ring-violet-500 dark:focus:ring-violet-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="remember" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-100">
                                        Ingat Saya
                                    </label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-4">
                                <button type="submit"
                                    class="w-full btn bg-violet-500 text-white hover:bg-violet-600 focus:ring focus:ring-violet-500/30 px-6 py-2.5 rounded">
                                    <i data-feather="log-in" class="inline h-4 w-4 mr-2"></i>Login
                                </button>
                            </div>

                            <!-- Forgot Password -->
                            @if (Route::has('password.request'))
                                <div class="text-center">
                                    <a href="{{ route('password.request') }}"
                                        class="text-sm text-violet-600 hover:text-violet-700 dark:text-violet-400 dark:hover:text-violet-300">
                                        <i data-feather="help-circle" class="inline h-4 w-4 mr-1"></i>Lupa Password?
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>

                <!-- Footer Info -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        &copy; {{ date('Y') }} Web Travel. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>

    @include('admin.components.scripts')
</body>

</html>
