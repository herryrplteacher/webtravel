<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wa__leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_id')->nullable()->constrained('routes')->nullOnDelete();
            $table->string('customer_name', 120)->nullable();
            $table->string('phone', 30)->nullable();
            $table->enum('source', ['home', 'detail', 'promo', 'other'])->default('other');
            $table->timestamp('clicked_at')->useCurrent();
            $table->timestamps();

            $table->index(['route_id', 'source', 'clicked_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wa__leads');
    }
};
