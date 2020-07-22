<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvancedMineralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advanced_minerals', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->unique();
            $table->unsignedInteger('crystals')->nullable();
            $table->unsignedInteger('morganites')->nullable();
            $table->unsignedInteger('fluorites')->nullable();
            $table->unsignedInteger('painites')->nullable();
            $table->unsignedInteger('aquamarines')->nullable();
            $table->unsignedInteger('jadeites')->nullable();
            $table->unsignedInteger('cymophanes')->nullable();
            $table->unsignedInteger('opals')->nullable();
            $table->unsignedInteger('pearls')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advanced_minerals');
    }
}
