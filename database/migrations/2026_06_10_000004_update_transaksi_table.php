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
        Schema::table('transaksi', function (Blueprint $table) {
            $table->string('transaction_id')->nullable()->unique();
            $table->string('payment_method')->nullable();
            $table->decimal('discount_amount', 12, 2)->default(0.00);
            $table->decimal('service_fee', 12, 2)->default(0.00);
            $table->decimal('tax_amount', 12, 2)->default(0.00);
            $table->decimal('total_amount', 12, 2)->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn([
                'transaction_id',
                'payment_method',
                'discount_amount',
                'service_fee',
                'tax_amount',
                'total_amount'
            ]);
        });
    }
};
