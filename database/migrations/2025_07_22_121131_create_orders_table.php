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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('user_id')->constrained('admins')->onDelete('restrict');
            $table->unsignedBigInteger('reg')->unique();
            $table->unsignedBigInteger('total')->nullable();
            $table->unsignedBigInteger('discount')->nullable();
            $table->unsignedBigInteger('vat')->nullable();
            $table->unsignedBigInteger('payable')->nullable();
            $table->unsignedBigInteger('pay')->nullable();
            $table->bigInteger('due')->nullable();
            $table->Integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
