<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('partners', function (Blueprint $table) {
        // ensure brand_id exists with correct type
        $table->unsignedBigInteger('brand_id')->nullable()->change();

        // apply foreign key
        $table->foreign('brand_id')
              ->references('id')
              ->on('brands')
              ->onDelete('set null'); // optional: cascade / restrict
    });
}

public function down()
{
    Schema::table('partners', function (Blueprint $table) {
        $table->dropForeign(['brand_id']);
    });
}

};
