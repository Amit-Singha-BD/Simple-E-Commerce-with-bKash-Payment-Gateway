<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('payment_id')->nullable();
            $table->string('trx_id')->nullable();
            $table->decimal('refund_amount', 10, 2);
            $table->text('refund_reason');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('refund');
    }
};
