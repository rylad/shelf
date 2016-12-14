<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectGameHistoriesAndGames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::table('game_histories', function (Blueprint $table) {

        $table->integer('game_id')->unsigned();

        $table->foreign('game_id')->references('id')->on('games');
		});
		
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game_histories',function (Blueprint $table){
			
		$table->dropForeign('game_histories_game_id_foreign');
        $table->dropColumn('game_id');
		
		});
    }
}
