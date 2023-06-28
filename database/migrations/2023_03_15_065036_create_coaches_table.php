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
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->foreign('level_id')->references('id')->on('coach_levels');
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic');
            $table->string('portrait');
            $table->json('description');
            $table->unsignedInteger('level_id');
            $table->string('canvas_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coaches');
    }
};
