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
        Schema::create('games', function (Blueprint $table) {
            $table->id('game_id');
            $table->string('title');
            $table->text('deskripsi'); // Assuming this is the description field
            $table->float('price', 8, 2);
            $table->unsignedBigInteger('publisher_id');
            $table->foreign('publisher_id')->references('publisher_id')->on('publishers')->onDelete('cascade');
            $table->date('release_date');
            $table->string('platform');
            $table->string('image');
            $table->timestamps(); // Add timestamps here if you want to track creation and update times
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
