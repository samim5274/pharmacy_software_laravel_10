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
        Schema::create('purchasereturnorders', function (Blueprint $table) {
            $table->id();
            $table->date('return_date')->nullable();
            $table->foreignId('user_id')->constrained('admins')->onDelete('restrict');
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('restrict');
            $table->unsignedBigInteger('chalan_reg')->unique();
            $table->unsignedBigInteger('total')->nullable();
            $table->unsignedBigInteger('discount')->nullable();
            $table->unsignedBigInteger('vat')->nullable();
            $table->unsignedBigInteger('payable')->nullable();
            $table->unsignedBigInteger('pay')->nullable();
            $table->bigInteger('due')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchasereturnorders');
    }
};
