<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category_admins', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('title', 100)->nullable();
            $table->string('photo')->nullable();
            $table->text('bio')->nullable();
            $table->string('phone', 20)->nullable();
            $table->enum('category', ['ikan', 'tumbuhan']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_admins');
    }
};
