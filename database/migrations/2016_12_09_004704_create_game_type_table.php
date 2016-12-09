<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTypeTable extends Migration
{
    public function up()
    {
        Schema::create('game_type', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            # `game_id` and `type_id` will be foreign keys, so they have to be unsigned
            # `game_id` will reference the `books table` and `type_id` will reference the `types` table.
            $table->integer('game_id')->unsigned();
            $table->integer('type_id')->unsigned();
            # Make foreign keys
            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('type_id')->references('id')->on('types');
        });
    }
    public function down()
    {
        Schema::drop('game_type');
    }
}