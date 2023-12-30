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
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->nullable();
            $table->boolean('gender')->default(0); // 1 for male, 0 for female
            $table->string('state')->nullable();
            $table->string('phone_number')->nullable();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('gender');
            $table->dropColumn('state');
            $table->dropColumn('phone_number');
        });
    }
};
