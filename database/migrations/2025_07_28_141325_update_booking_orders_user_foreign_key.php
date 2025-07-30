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
         Schema::table('booking_orders', function (Blueprint $table) {
        // Step 1: Drop existing foreign key
        $table->dropForeign(['user_id']);

        // Step 2: Re-assign foreign key to `registers` table
        $table->foreign('user_id')->references('id')->on('registers')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('booking_orders', function (Blueprint $table) {
        // Rollback logic: reset it to users table
        $table->dropForeign(['user_id']);
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
    }
};
