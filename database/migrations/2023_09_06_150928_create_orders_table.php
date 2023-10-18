<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->decimal('total_price', 8, 2)->nullable();
            $table->enum(
                'status',
                ['IN_CART', 'PENDING', 'SUCCESS', 'FAILED','WISHLIST']
            )->default('IN_CART');
            $table->enum('delivery_status', ['PENDING', 'ON_THE_WAY','DELIVERED'])->nullable();
            $table->boolean('is_paid')->default(false);
            $table->string('payment_method')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->foreignId('shipping_address_id')->nullable()->constrained('shipping_addresses');
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
