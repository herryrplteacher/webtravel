@extends('admin.master')

@section('title')
    <title>Tambah Jadwal Route</title>
@endsection

@section('content')
    <div class="min-h-screen page-content dark:bg-zinc-700">
        <div class="container-fluid px-[0.625rem]">

            <div class="grid grid-cols-1 pb-6">
                <div class="md:flex items-center justify-between px-[2px]">
                    <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">
                        Tambah Jadwal Route</h4>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                            <li class="inline-flex items-center">
                                <a href="{{ route('index.route_schedule') }}"
                                    class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                    Jadwal Route
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center rtl:mr-2">
                                    <i
                                        class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                    <span
                                        class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100">Tambah
                                        Jadwal</span>
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
                            <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100 font-semibold">
                                Form Tambah Jadwal Route
                            </h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.route_schedule') }}" method="POST">
                                @csrf

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
                                                {{ old('route_id') == $route->id ? 'selected' : '' }}>
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
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                        for="schedule_type">
                                        Tipe Jadwal <span class="text-red-500">*</span>
                                    </label>
                                    <select
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100 @error('schedule_type') border-red-500 @enderror"
                                        id="schedule_type" name="schedule_type" required onchange="toggleScheduleFields()">
                                        <option value="">Pilih Tipe Jadwal</option>
                                        <option value="daily" {{ old('schedule_type') == 'daily' ? 'selected' : '' }}>Setiap
                                            Hari</option>
                                        <option value="weekday" {{ old('schedule_type') == 'weekday' ? 'selected' : '' }}>
                                            Hari Kerja (Senin-Jumat)</option>
                                        <option value="weekend" {{ old('schedule_type') == 'weekend' ? 'selected' : '' }}>
                                            Akhir Pekan (Sabtu-Minggu)</option>
                                        <option value="dow" {{ old('schedule_type') == 'dow' ? 'selected' : '' }}>Hari
                                            Tertentu</option>
                                        <option value="date" {{ old('schedule_type') == 'date' ? 'selected' : '' }}>Tanggal
                                            Spesifik</option>
                                    </select>
                                    @error('schedule_type')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4" id="day_of_week_field" style="display: none;">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100" for="day_of_week">
                                        Hari <span class="text-red-500">*</span>
                                    </label>
                                    <select
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100 @error('day_of_week') border-red-500 @enderror"
                                        id="day_of_week" name="day_of_week">
                                        <option value="">Pilih Hari</option>
                                        <option value="0" {{ old('day_of_week') === '0' ? 'selected' : '' }}>Minggu
                                        </option>
                                        <option value="1" {{ old('day_of_week') == 1 ? 'selected' : '' }}>Senin</option>
                                        <option value="2" {{ old('day_of_week') == 2 ? 'selected' : '' }}>Selasa
                                        </option>
                                        <option value="3" {{ old('day_of_week') == 3 ? 'selected' : '' }}>Rabu</option>
                                        <option value="4" {{ old('day_of_week') == 4 ? 'selected' : '' }}>Kamis</option>
                                        <option value="5" {{ old('day_of_week') == 5 ? 'selected' : '' }}>Jumat</option>
                                        <option value="6" {{ old('day_of_week') == 6 ? 'selected' : '' }}>Sabtu</option>
                                    </select>
                                    @error('day_of_week')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4" id="specific_date_field" style="display: none;">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100"
                                        for="specific_date">
                                        Tanggal Spesifik <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('specific_date') border-red-500 @enderror"
                                        type="date" id="specific_date" name="specific_date"
                                        value="{{ old('specific_date') }}">
                                    @error('specific_date')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100" for="depart_time">
                                        Waktu Keberangkatan <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('depart_time') border-red-500 @enderror"
                                        type="time" id="depart_time" name="depart_time" value="{{ old('depart_time') }}"
                                        required>
                                    @error('depart_time')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100" for="note">
                                        Catatan
                                    </label>
                                    <input
                                        class="w-full placeholder:text-sm py-2 px-3 rounded border-gray-300 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 @error('note') border-red-500 @enderror"
                                        type="text" id="note" name="note" value="{{ old('note') }}"
                                        placeholder="Contoh: Pagi, Siang, Malam" maxlength="100">
                                    @error('note')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="is_active" name="is_active" value="1"
                                            {{ old('is_active', true) ? 'checked' : '' }}
                                            class="w-4 h-4 text-violet-600 bg-gray-100 border-gray-300 rounded focus:ring-violet-500 dark:focus:ring-violet-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="is_active"
                                            class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-100">
                                            Aktif
                                        </label>
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <button type="submit"
                                        class="btn bg-violet-500 text-white hover:bg-violet-600 focus:ring focus:ring-violet-500/30 px-6 py-2 rounded">
                                        Simpan
                                    </button>
                                    <a href="{{ route('index.route_schedule') }}"
                                        class="btn bg-gray-200 text-gray-700 hover:bg-gray-300 focus:ring focus:ring-gray-300/30 px-6 py-2 rounded dark:bg-zinc-600 dark:text-gray-100 dark:hover:bg-zinc-700">
                                        Batal
                                    </a>
                                </div>
                            </form>
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

    <script>
        function toggleScheduleFields() {
            const scheduleType = document.getElementById('schedule_type').value;
            const dayOfWeekField = document.getElementById('day_of_week_field');
            const specificDateField = document.getElementById('specific_date_field');
            const dayOfWeekInput = document.getElementById('day_of_week');
            const specificDateInput = document.getElementById('specific_date');

            // Hide all conditional fields
            dayOfWeekField.style.display = 'none';
            specificDateField.style.display = 'none';

            // Remove required attribute
            dayOfWeekInput.removeAttribute('required');
            specificDateInput.removeAttribute('required');

            // Show and set required based on schedule type
            if (scheduleType === 'dow') {
                dayOfWeekField.style.display = 'block';
                dayOfWeekInput.setAttribute('required', 'required');
            } else if (scheduleType === 'date') {
                specificDateField.style.display = 'block';
                specificDateInput.setAttribute('required', 'required');
            }
        }

        // Call on page load to handle old() values
        document.addEventListener('DOMContentLoaded', function() {
            toggleScheduleFields();
        });
    </script>
@endsection
