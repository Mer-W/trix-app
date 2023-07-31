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
            $table->id();
            // FIXME default date
            $table->date('date')->default->useCurrent();
            $table->foreignId('north_id');
            $table->foreignId('east_id');
            $table->foreignId('south_id');
            $table->foreignId('west_id');
            $table->integer('final_n')->nullable();
            $table->integer('final_e')->nullable();
            $table->integer('final_s')->nullable();
            $table->integer('final_w')->nullable();
            $table->timestamps();
            $table->foreign('north_id')->references('id')->on('users');
            $table->foreign('east_id')->references('id')->on('users');
            $table->foreign('south_id')->references('id')->on('users');
            $table->foreign('west_id')->references('id')->on('users');

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
