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
            $table->string('agent_id');
            $table->string('amount');
            $table->string('brand_id');
            $table->string('email');
            $table->string('order_id');
            $table->string('membership_id');
            $table->string('name');
            $table->string('order_by');
            $table->string('order_no');
            $table->string('receipt');
            $table->string('status');
            $table->string('user_id');
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
