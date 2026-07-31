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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Relasi ke kategori
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('thumbnail'); // Foto utama artikel
            $table->text('content'); // Isi artikel (bisa menampung HTML dari Rich Text Editor)
            $table->integer('reading_time')->default(3); // Estimasi menit baca untuk UX
            $table->boolean('is_published')->default(false); // Sistem draft/publish
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
