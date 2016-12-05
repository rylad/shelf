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
    public function player() {
        return $this->belongsTo('App\player');
    }
    /* End Relationship Methods */
}