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
        Schema::create('table_alat', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_alat');
            $table->integer('harga_alat');
            $table->string('input_gambar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_alat');
    }
};
