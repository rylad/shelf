<?php

use Illuminate\Database\Seeder;
use App\Type;
use App\Game;

class GameTypeTableSeeder extends Seeder
{
    public function run()
    {
        # First, create an array of all the books we want to associate tags with
        # The *key* will be the book title, and the *value* will be an array of tags.
        $games =[
            'Pandemic' => ['co-op', 'multiplayer'],
            'Twilight Struggle' => ['competative', 'multiplayer'],
            'Ticket to Ride' => ['competative', 'multiplayer']
        ];
        # Now loop through the above array, creating a new pivot for each book to type
        foreach($games as $game => $types) {
            # First get the book
            $name = Game::where('game','like',$game)->first();
            # Now loop through each type for this book, adding the pivot
            foreach($types as $typeName) {
                $type = type::where('name','LIKE',$typeName)->first();
                # Connect this type to this book
                $name->types()->save($type);
            }
        }
    }
}