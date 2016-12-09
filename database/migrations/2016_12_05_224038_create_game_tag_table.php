<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateGameTagTable extends Migration
{
    public function up()
    {
        Schema::create('game_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            # `game_id` and `tag_id` will be foreign keys, so they have to be unsigned
            # `game_id` will reference the `books table` and `tag_id` will reference the `tags` table.
            $table->integer('game_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            # Make foreign keys
            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }
    public function down()
    {
        Schema::drop('game_tag');
    }
}