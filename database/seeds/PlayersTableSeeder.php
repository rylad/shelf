<?php
use Illuminate\Database\Seeder;
use App\Author;
class PlayersTableSeeder extends Seeder
{
    public function run()
    {
        
        DB::table('players')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'first' => 'Tim',
			'last' => 'Douglas',
			'nick' => 'TDAWG',
        ]);
        
		DB::table('players')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'first' => 'Tina',
			'last' => 'Douglas',
			'nick' => 'Tinrow',
        ]);
		
		DB::table('players')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'first' => 'Sean',
			'last' => 'Valois',
			'nick' => 'The Boss',
        ]);
    }
}