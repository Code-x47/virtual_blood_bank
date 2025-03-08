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
            $table->foreignId('user_id')->constrained();
            $table->foreignId('blood_inventory_id')->constrained();
            $table->integer('quantity');
            $table->enum('status',['pending', 'approved', 'rejected', 'completed', 'cancelled']);
            $table->string('delivery_address');
            $table->timestamp('order_date');
            $table->timestamp('delivery_date')->nullable();
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
