<?php
use Illuminate\Database\Seeder;
use App\Game;
use App\Tag;
class GameTagTableSeeder extends Seeder
{
    public function run()
    {
        # First, create an array of all the books we want to associate tags with
        # The *key* will be the book title, and the *value* will be an array of tags.
        $games =[
            'Pandemic' => ['long', 'fantasy'],
            'Twilight Struggle' => ['long', 'realistic'],
            'Ticket to Ride' => ['short', 'realistic']
        ];
        # Now loop through the above array, creating a new pivot for each book to tag
        foreach($games as $game => $tags) {
            # First get the book
            $name = Game::where('game','like',$game)->first();
            # Now loop through each tag for this book, adding the pivot
            foreach($tags as $tagName) {
                $tag = Tag::where('name','LIKE',$tagName)->first();
                # Connect this tag to this book
                $name->tags()->save($tag);
            }
        }
    }
}