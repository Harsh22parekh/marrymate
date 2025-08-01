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
        Schema::create('booking_items', function (Blueprint $table) {
            $table->id();
             $table->foreignId('booking_order_id')->constrained()->onDelete('cascade');

    $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('cascade');
    $table->foreignId('package_id')->nullable()->constrained('packages')->onDelete('cascade');

    $table->string('name');
    $table->string('service_image');
    $table->integer('qty');
    $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_items');
    }
};
