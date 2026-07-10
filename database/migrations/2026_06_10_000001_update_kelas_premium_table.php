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
            $table->string('kategori')->default('Lainnya');
            $table->decimal('rating', 3, 2)->default(4.5);
            $table->integer('discount_percentage')->nullable();
            $table->timestamp('discount_expiry')->nullable();
            $table->string('duration')->default('10 Jam');
            $table->integer('lessons_count')->default(8);
            $table->json('includes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kelas_premium', function (Blueprint $table) {
            $table->dropColumn([
                'kategori',
                'rating',
                'discount_percentage',
                'discount_expiry',
                'duration',
                'lessons_count',
                'includes'
            ]);
        });
    }
};
