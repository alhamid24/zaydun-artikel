<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('owner_profile', function (Blueprint $table) {
            $table->string('whatsapp')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('owner_profile', function (Blueprint $table) {
            $table->dropColumn('whatsapp');
        });
    }
};
