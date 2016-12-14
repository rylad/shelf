<?php

use Illuminate\Database\Seeder;

class GameHistoryTableSeeder extends Seeder
{
    public function run()
    {
        
        DB::table('game_histories')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'length' => 10,
            'winner' => 'TestUser',
            'game_id' => 1,
			'user_id' => 1, 
        ]);
        
        DB::table('game_histories')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'length' => 30,
            'winner' => 'TestUser',
            'game_id' => 2,
			'user_id' => 1, 
        ]);
		
        DB::table('game_histories')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'length' => 40,
            'winner' => 'TestUser',
            'game_id' => 3,
			'user_id' => 1, 
        ]);    }
}