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
        Schema::create('about_contents', function (Blueprint $table) {
            $table->id();
            $table->string('main_title'); // "Welcome to Marry Mate"
            $table->text('main_description');

            $table->string('mission_title')->nullable();
            $table->text('mission_content_1')->nullable();
            $table->text('mission_content_2')->nullable();

            $table->json('features')->nullable(); 

            $table->string('main_image')->nullable();      
            $table->string('mission_image')->nullable();   
            $table->string('mission_bg_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_contents');
    }
};
