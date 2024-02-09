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
        Schema::create('rekaps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calon_id')->constrained();
            $table->foreignId('partai_id')->constrained();
            $table->foreignId('dapil_id')->constrained();
            $table->foreignId('kecamatan_id')->constrained();
            $table->foreignId('kelurahan_id')->constrained();
            $table->foreignId('tps_id')->constrained();
            $table->integer('jumlah')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekaps');
    }
};
