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
            $table->string('deskripsi');
            $table->string('price');
            $table->unsignedBigInteger('publisher_id'); // Use unsignedBigInteger here
            $table->foreign('publisher_id')->references('publisher_id')->on('publishers')->onDelete('cascade');
            $table->date('release_date');
            $table->string('platform');
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
    

