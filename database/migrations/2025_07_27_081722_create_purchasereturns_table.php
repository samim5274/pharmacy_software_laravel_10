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
        Schema::create('purchasereturns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chalan_reg')->constrained('purchaseorders')->onDelete('restrict');
            $table->foreignId('product_id')->constrained('products')->onDelete('restrict');
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('restrict');
            $table->integer('return_qty');
            $table->date('return_date')->default(now());
            $table->text('reason')->default('N/A');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchasereturns');
    }
};
