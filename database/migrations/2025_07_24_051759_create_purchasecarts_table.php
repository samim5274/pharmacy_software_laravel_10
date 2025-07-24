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
        Schema::create('purchasecarts', function (Blueprint $table) {
            $table->id();
            $table->date('date');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('chalan_reg')->nullable();
            $table->unsignedBigInteger('medicine_id');

            $table->integer('order_qty')->default(1);
            $table->integer('delivery_qty')->default(0);

            $table->integer('status')->default(1); // ['1 = order','2 = delivery','3 = cancelled']
            $table->string('remark')->nullable();

            $table->integer('purchase_price')->nullable();
            $table->integer('price')->nullable();
            $table->integer('total_purchase_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchasecarts');
    }
};
