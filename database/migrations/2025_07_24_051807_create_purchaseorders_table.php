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
        Schema::create('purchaseorders', function (Blueprint $table) {
            $table->id();
            $table->date('order_date');
            $table->date('delivary_date')->nullable();
            $table->foreignId('user_id')->constrained('admins')->onDelete('restrict');
            $table->unsignedBigInteger('chalan_reg')->unique();
            $table->unsignedBigInteger('total')->nullable();
            $table->unsignedBigInteger('discount')->nullable();
            $table->unsignedBigInteger('vat')->nullable();
            $table->unsignedBigInteger('payable')->nullable();
            $table->unsignedBigInteger('pay')->nullable();
            $table->bigInteger('due')->nullable();
            $table->Integer('status')->default(1); // ['1 = order', '2 = delivery', '3 = cancelled']
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchaseorders');
    }
};
