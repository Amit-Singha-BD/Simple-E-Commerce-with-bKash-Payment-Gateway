<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('total_price');
            $table->string('customer_name');
            $table->string('phone');
            $table->string('quantity');
            $table->enum('status', ['pending', 'delivered', 'refunded'])->default('pending');
            $table->string('division');
            $table->string('district');
            $table->string('upazila');
            $table->string('payment_id');
            $table->string('trx_id');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('orders');
    }
};
