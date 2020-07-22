<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtsAttempts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debts_attempts', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->unique();
            $table->enum('type', ['loan', 'credit']);
            $table->integer('percentage');
            $table->tinyInteger('successful')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debts_attempts');
    }
}
