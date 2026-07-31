<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('owner_profile', function (Blueprint $table) {
            $table->string('ikan_admin_name')->nullable();
            $table->string('ikan_admin_title')->nullable();
            $table->string('ikan_admin_photo')->nullable();
            $table->text('ikan_admin_bio')->nullable();
            $table->string('tumbuhan_admin_name')->nullable();
            $table->string('tumbuhan_admin_title')->nullable();
            $table->string('tumbuhan_admin_photo')->nullable();
            $table->text('tumbuhan_admin_bio')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('owner_profile', function (Blueprint $table) {
            $table->dropColumn([
                'ikan_admin_name',
                'ikan_admin_title',
                'ikan_admin_photo',
                'ikan_admin_bio',
                'tumbuhan_admin_name',
                'tumbuhan_admin_title',
                'tumbuhan_admin_photo',
                'tumbuhan_admin_bio',
            ]);
        });
    }
};
