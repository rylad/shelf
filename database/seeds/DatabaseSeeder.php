<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		$this->call(UsersTableSeeder::class);
		$this->call(GamesTableSeeder::class);
		$this->call(PlayersTableSeeder::class);
		$this->call(TagsTableSeeder::class);
		$this->call(TypeTableSeeder::class);
		$this->call(GameTagTableSeeder::class);
		$this->call(GameTypeTableSeeder::class);		
		
    }
}
