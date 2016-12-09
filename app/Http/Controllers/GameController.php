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
    public function index()
    {
        //
		return view('game.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('game.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $game = $request->input('game');
        
		$game = new Game();
        $game->game = $request->input('game');
		$game->rating = $request->input('rating');
		$game->no_players = $request->input('no_players');
	    $game->purchase_link = $request->input('purchase_link');
		$game->geek_link = $request->input('geek_link');
		$game->art = $request->input('art');
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
        //
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
    public function destroy($id)
    {
        //
    }
}