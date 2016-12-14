<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Game extends Model
{
    /* Relationship Methods */
    /**
	*
	*/
    public function game() {
        # Book belongs to Author
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\game');
    }
    /**
	*
	*/
    public function tags()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
	
	
    public function types()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Type')->withTimestamps();
    }
	
    public function player() {
        return $this->belongsTo('App\player');
    }
	
	public function user() {
        return $this->belongsTo('App\User');
    }
	
	public function Game_historys() {
		return $this->hasMany('App\game_history');
    }
	
    public static function getForDropdown() {
        # game
        $games = game::orderBy('game', 'ASC')->get();
        $games_for_dropdown = [];
        foreach($games as $game) {
            $games_for_dropdown[$game->id] = $game->game;
        }
        return $games_for_dropdown;	
	}
}