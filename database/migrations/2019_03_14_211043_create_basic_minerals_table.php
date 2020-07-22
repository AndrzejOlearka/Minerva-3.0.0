<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicMineralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_minerals', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->unique();
            $table->integer('ambers')->default(5);
            $table->integer('agates')->nullable();
            $table->integer('malachites')->nullable();
            $table->integer('turquoises')->nullable();
            $table->integer('amethysts')->nullable();
            $table->integer('topazes')->nullable();
            $table->integer('emeralds')->nullable();
            $table->integer('rubies')->nullable();
            $table->integer('sapphires')->nullable();
            $table->integer('diamonds')->nullable();
            $table->integer('silver')->nullable();
            $table->integer('gold')->nullable();

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
        Schema::dropIfExists('basic_minerals');
    }
}
