<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('route_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_id')->constrained('routes')->cascadeOnDelete();

            $table->enum('schedule_type', ['daily', 'weekday', 'weekend', 'dow', 'date'])
                ->default('daily');

            // dipakai kalau schedule_type = 'dow' (0=Sunday ... 6=Saturday)
            $table->unsignedTinyInteger('day_of_week')->nullable();

            // dipakai kalau schedule_type = 'date'
            $table->date('specific_date')->nullable();

            $table->time('depart_time');
            $table->string('note', 100)->nullable(); // contoh: "Pagi", "Siang", "Malam"
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index(['route_id', 'is_active']);
            $table->index(['schedule_type']);
            $table->index(['day_of_week']);
            $table->index(['specific_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('route_schedules');
    }
};
