<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_rewards', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->unique();
            $table->boolean('availability')->nullable();
            $table->dateTime('reward_time')->nullable();
            $table->unsignedSmallInteger('reward_days')->nullable();

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
        Schema::dropIfExists('daily_rewards');
    }
}
