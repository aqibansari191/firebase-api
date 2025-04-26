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
        Schema::create('patners', function (Blueprint $table) {
            $table->unsignedBigInteger('partner_id')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('number')->nullable();
            $table->string('gender')->nullable();

            $table->boolean('new_user')->default(true);
            $table->boolean('status')->default(true);

            $table->json('brand_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patners');
    }
};
