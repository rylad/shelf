<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Game;
use App\Tag;
use App\Type;
use Session;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
		
		if ($user){
			#$games=$user->games()->get();
			$games = Game::where('user_id', '=', $user->id)->orderBy('id','DESC')->get();
		}
		else{
			$games=[];
		}
		
		return view('game.index')->with([
			'games'=> $games
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tags_for_checkboxes = Tag::getForCheckboxes();
        $types_for_checkboxes = Type::getForCheckboxes();
		

        return view('game.create')->with(
            [
                'types_for_checkboxes' => $types_for_checkboxes,
                'tags_for_checkboxes' => $tags_for_checkboxes,
            ]
        );
    }	

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
            'game' => 'required|min:5',
            'rating' => 'required|min:1 | max:10',
            'no_players' => 'required|min:1|max:20|numeric',
            'purchase_link' => 'required|url',
			'geek_link' => 'required|url',
			'art' => 'required|url',
        ]);
		
		$game = $request->input('game');
        
		$game = new Game();
        $game->game = $request->input('game');
		$game->rating = $request->input('rating');
		$game->no_players = $request->input('no_players');
	    $game->purchase_link = $request->input('purchase_link');
		$game->geek_link = $request->input('geek_link');
		$game->art = $request->input('art');
		$game->user_id=$request->user()->id;
        $game->save();
		
        # Save Tags
        $tags = ($request->tags) ?: [];
		$game->tags()->sync($tags);
        $game->save();
		
		$types = ($request->types) ?: [];		
		$game->types()->sync($types);
		$game->save();
		
        Session::flash('flash_message', 'Your game '.$game->game.' was added.');
        return redirect('/games');
    }
		
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $game = Game::find($id);
        if(is_null($game)) {
            Session::flash('message','Game not found');
            return redirect('/games');
        }
        return view('game.show')->with([
            'game' => $game,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = game::find($id);
        $tags_for_checkboxes = Tag::getForCheckboxes();
        $types_for_checkboxes = Type::getForCheckboxes();
		
        $tags_for_this_game = [];
		$types_for_this_game = [];
		
        foreach($game->tags as $tag) {
            $tags_for_this_game[] = $tag->name;
        }
       

        foreach($game->types as $type) {
            $types_for_this_game[] = $type->name;
        }
        return view('game.edit')->with(
            [
                'game' => $game,
                'types_for_checkboxes' => $types_for_checkboxes,
                'types_for_this_game' => $types_for_this_game,
                'tags_for_checkboxes' => $tags_for_checkboxes,
                'tags_for_this_game' => $tags_for_this_game			
            ]
        );
    }	

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 
	$this->validate($request, [
            'game' => 'required|min:5',
            'rating' => 'required|min:1 | max:10 ',
            'no_players' => 'required|min:1|max:20|numeric',
            'purchase_link' => 'required|url',
			'geek_link' => 'required|url',
			'art_link' => 'required|url',
        ]);

	$game=Game::find($request->id);
	$game->game = $request->game;
	$game->rating = $request->rating;
	$game->no_players = $request->no_players;
	$game->purchase_link = $request->purchase_link;
	$game->geek_link = $request->geek_link;
	$game->art = $request->art;
	$game->save();
	
	if($request->tags){
		$tags = $request->tags;
	}
	
	else {
		$tags=[];
	}
	
	$game->tags()->sync($tags);
	$game->save();
	
	if($request->types){
		$types = $request->types;
	}
	
	else {
		$types=[];
	}
	
	$game->types()->sync($types);
	$game->save();
	
	Session::flash('flash_message', 'Your changes to '.$game->game.' were saved.');
	return redirect('/games');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

	public function delete($id){
		
		$game=Game::find($id);
		return view('game.delete')->with('game',$game);
		
	}

	 public function destroy($id)
    {
        # Get the game to be deleted
        $game = game::find($id);
        if(is_null($game)) {
            Session::flash('message','game not found.');
            return redirect('/games');
        }
        # First remove any tags associated with this game
        if($game->tags()) {
            $game->tags()->detach();
        }
		
		if($game->types()) {
            $game->types()->detach();
        }
		
		
		
        # Then delete the game
        $game->delete();
        # Finish
        Session::flash('flash_message', $game->game.' was deleted.');
        return redirect('/games');
    }
}