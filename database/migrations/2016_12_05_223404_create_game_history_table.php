<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('game_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('winner');
			$table->integer('length');
			
        });
    }
    public function down()
    {
        Schema::drop('game_histories');
    }
}