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
        Schema::create('hands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dealer_id');
            $table->foreignId('game_id');
            $table->enum('contract', ['j', 'q', 'nt', 'k', 'd']);
            $table->integer('north');
            $table->integer('east');
            $table->integer('south');
            $table->integer('west');
            $table->timestamps();
            $table->foreign('dealer_id')->references('id')->on('users');
            $table->foreign('game_id')->references('id')->on('games');
            $table->unique(['dealer_id', 'game_id', 'contract']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hands');
    }
};
