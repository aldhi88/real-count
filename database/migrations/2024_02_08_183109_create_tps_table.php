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
        Schema::create('tps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dapil_id')->constrained();
            $table->foreignId('kecamatan_id')->constrained();
            $table->foreignId('kelurahan_id')->constrained();
            $table->smallInteger('no_tps');
            $table->integer('jlh_pemilih');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tps');
    }
};
