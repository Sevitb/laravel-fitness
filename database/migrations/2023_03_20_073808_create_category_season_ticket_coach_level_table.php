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
        Schema::create('category_season_ticket_coach_level', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('season_ticket_id');
            $table->unsignedBigInteger('coach_level_id');
            $table->unsignedInteger('season_ticket_price');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('season_ticket_id')->references('id')->on('season_tickets')->delete('cascade');
            $table->foreign('coach_level_id')->references('id')->on('coach_levels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_season_ticket_coach_level');
    }
};
