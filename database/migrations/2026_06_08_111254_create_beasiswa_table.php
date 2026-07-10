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
        Schema::create('beasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penyelenggara');
            $table->enum('kategori', ['dalam negeri', 'luar negeri']);
            $table->string('jenjang'); // D3, S1, S2, S3, dll.
            $table->string('jurusan')->default('Semua Jurusan');
            $table->decimal('min_ipk', 3, 2)->nullable();
            $table->date('deadline');
            $table->text('deskripsi');
            $table->string('link_resmi')->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswa');
    }
};
