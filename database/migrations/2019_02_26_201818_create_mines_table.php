<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mines', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->unique();
            $table->unsignedInteger('ambers')->nullable();
            $table->unsignedInteger('agates')->nullable();
            $table->unsignedInteger('malachites')->nullable();
            $table->unsignedInteger('turquoises')->nullable();
            $table->unsignedInteger('amethysts')->nullable();
            $table->unsignedInteger('topazes')->nullable();
            $table->unsignedInteger('emeralds')->nullable();
            $table->unsignedInteger('rubies')->nullable();
            $table->unsignedInteger('sapphires')->nullable();
            $table->unsignedInteger('diamonds')->nullable();
            $table->unsignedInteger('silver')->nullable();
            $table->unsignedInteger('gold')->nullable();

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
        Schema::dropIfExists('mines');
    }
}
