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
    Schema::table('partners', function (Blueprint $table) {
        $table->string('password')->nullable()->after('email'); // "after" optional hai
    });
}

public function down(): void
{
    Schema::table('partners', function (Blueprint $table) {
        $table->dropColumn('password');
    });
}

};
