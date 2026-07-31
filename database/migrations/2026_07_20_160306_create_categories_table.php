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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: Ikan Cupang, Tumbuh-tumbuhan
            $table->string('slug')->unique(); // Untuk URL yang rapi (zaydun.com/kategori/ikan-cupang)
            $table->string('icon')->nullable(); // Untuk menyimpan nama ikon/gambar kategori
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
