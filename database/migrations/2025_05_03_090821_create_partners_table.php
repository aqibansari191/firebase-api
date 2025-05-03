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
        Schema::create('partners', function (Blueprint $table) {
            $table->bigIncrements('id'); // Auto-incremented id
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('gender')->nullable();
            $table->string('number')->nullable();
            $table->boolean('new_user')->default(false);
            $table->boolean('status')->default(false);
            $table->unsignedBigInteger('brand_id')->nullable(); // Foreign Key reference to brand table
            $table->timestamps(); // created_at and updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
