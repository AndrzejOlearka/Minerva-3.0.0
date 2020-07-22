<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->unique();
            $table->dateTime('last_mission_1')->nullable();
            $table->dateTime('last_mission_2')->nullable();
            $table->dateTime('last_mission_3')->nullable();
            $table->dateTime('last_mission_4')->nullable();
            $table->dateTime('last_mission_5')->nullable();
            $table->dateTime('last_mission_6')->nullable();
            $table->dateTime('last_mission_7')->nullable();
            $table->dateTime('last_mission_8')->nullable();
            $table->dateTime('last_mission_9')->nullable();

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
        Schema::dropIfExists('missions');
    }
}
