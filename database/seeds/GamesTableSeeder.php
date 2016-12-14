<?php
use Illuminate\Database\Seeder;
use App\Author;
class GamesTableSeeder extends Seeder
{
    public function run()
    {
        
        DB::table('games')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'game' => 'Pandemic',
            'rating' => '1',
            'no_players' => '4',
            'purchase_link' => 'https://www.amazon.com/Z-Man-Games-ZMG-71100-Pandemic/dp/B00A2HD40E/ref=sr_1_1?s=toys-and-games&ie=UTF8&qid=1480978494&sr=1-1&keywords=pandemic',
            'geek_link' => 'https://boardgamegeek.com/boardgame/30549/pandemic',
			'art' => 'https://cf.geekdo-images.com/images/pic1534148.jpg', 
			'user_id' => 1, 
        ]);
        
        DB::table('games')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'game' => 'Ticket to Ride',
            'rating' => '2',
            'no_players' => '4',
            'purchase_link' => 'https://www.amazon.com/Days-of-Wonder-DOW-7201/dp/0975277324',
            'geek_link' => 'https://boardgamegeek.com/boardgame/9209/ticket-ride',
			'art' => 'https://images-na.ssl-images-amazon.com/images/I/61dDQUfhuvL._SX300_.jpg',
			'user_id' => 1, 
        ]);
		
		DB::table('games')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'game' => 'twilight struggle',
            'rating' => '3',
            'no_players' => '2',
            'purchase_link' => 'https://www.amazon.com/GMT-Games-0510-14-Twilight-Struggle/dp/B0060L6EE4',
            'geek_link' => 'https://boardgamegeek.com/boardgame/12333/twilight-struggle',
			'art' => 'https://cf.geekdo-images.com/images/pic361592.jpg',
			'user_id' => 1, 
        ]);
    }
}