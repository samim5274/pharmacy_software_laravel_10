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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reg');
            $table->date('date');
            $table->foreignId('user_id')->constrained('admins')->onDelete('restrict');
            $table->foreignId('medicine_id')->constrained('products')->onDelete('restrict');
            $table->integer('qty')->default(1);
            $table->integer('unit_price');
            $table->integer('total_price');
            $table->date('exp_date');
            $table->date('mfg_date');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
