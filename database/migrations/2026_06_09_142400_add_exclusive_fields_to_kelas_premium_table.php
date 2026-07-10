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
        Schema::table('kelas_premium', function (Blueprint $table) {
            $table->text('konten_publik')->nullable();
            $table->longText('konten_premium')->nullable();
            $table->string('file_materi', 500)->nullable();
            $table->string('link_zoom', 500)->nullable();
            $table->string('link_rekaman', 500)->nullable();
            $table->json('kurikulum')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kelas_premium', function (Blueprint $table) {
            $table->dropColumn([
                'konten_publik',
                'konten_premium',
                'file_materi',
                'link_zoom',
                'link_rekaman',
                'kurikulum'
            ]);
        });
    }
};
