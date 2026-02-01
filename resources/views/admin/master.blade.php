<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="template d3trans" name="herry prasetyo">
    <meta content="d3trans" name="herry prasetyo">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">
    <!-- Layout config Js -->
    <!-- Icons CSS -->


    <!-- Tailwind CSS -->
    @include('admin.components.style')
    @yield('css')
</head>

<body data-mode="light" data-sidebar-size="lg" class="group">

    <!-- ========== Left Sidebar Start ========== -->
    <div
        class="fixed bottom-0 z-10 h-screen ltr:border-r rtl:border-l vertical-menu rtl:right-0 ltr:left-0 top-[70px] bg-slate-50 border-gray-50 print:hidden dark:bg-zinc-800 dark:border-neutral-700">

        @include('admin.components.sidebar')
    </div>
    <!-- Left Sidebar End -->
    @include('admin.components.navbar')


    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        @yield('content')
    </div>



    @yield('js')
    @include('admin.components.scripts')
</body>

</html>
