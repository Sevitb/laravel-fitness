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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coach_level_id')->nullable();
            $table->string('title');
            $table->string('price')->nullable();
            $table->json('description');
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('coach_level_id')->references('id')->on('coach_levels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
