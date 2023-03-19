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
        Schema::create('category_service_coach_level', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('coach_level_id');
            $table->unsignedInteger('service_price');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('coach_level_id')->references('id')->on('coach_levels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_service_coach_level');
    }
};
