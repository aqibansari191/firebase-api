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
        Schema::create('membership', function (Blueprint $table) {
            $table->id('member_id');
            $table->string('brand_id')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('brand_logo_url')->nullable();
            $table->string('coupon_title_tab1')->nullable();
            $table->string('coupon_title_tab2')->nullable();
            $table->text('desc')->nullable();
            $table->string('duration')->nullable();
            $table->string('fcm_token')->nullable();
            $table->string('hero_image_url')->nullable();
            $table->string('custom_id')->nullable();
            $table->boolean('is_food_without_stay')->default(false);
            $table->text('more_info')->nullable();
            $table->integer('no_of_coupons')->default(0);
            $table->text('offers')->nullable();
            $table->integer('price')->default(0);
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->string('unit')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership');
    }
};
