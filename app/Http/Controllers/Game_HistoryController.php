<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Game_History;
use App\Game;
use App\Tag;
use App\Type;
use Session;

class Game_HistoryController extends Controller
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
			#$game_histories=$user->game_histories()->get();
			$game_histories = Game_History::where('user_id', '=', $user->id)->orderBy('id','DESC')->get();
		}
		else{
			$game_histories=[];
		}
		
		return view('game_history.index')->with([
			'game_histories'=> $game_histories

		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
		$games_for_dropdown=Game::getForDropdown();
       

        return view('game_history.create')->with(
            [
                
				'games_for_dropdown'=>$games_for_dropdown,
	
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
            'winner' => 'required|min:1|max:20|alpha_num',
            'length' => 'required|min:1|max:300|numeric',
        ]);

	$game_history=new Game_History;
	$game_history->game_id = $request->game_id;
	$game_history->winner = $request->winner;
	$game_history->length = $request->length;
	$game_history->user_id=$request->user()->id;
	$game_history->save();
	
	Session::flash('flash_message', 'Game session '.$game_history->id.' was saved.');
	return redirect('/game_histories');
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
        $game_history = Game_History::find($id);
        if(is_null($game_history)) {
            Session::flash('message','game_history not found');
            return redirect('/game_histories');
        }
        return view('game_history.show')->with([
            'game_history' => $game_history,
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
        $game_history = Game_History::find($id);
		$games_for_dropdown=Game::getForDropdown();
       

        return view('game_history.edit')->with(
            [
                'game_history' => $game_history,
				'games_for_dropdown'=>$games_for_dropdown,
	
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
            'winner' => 'required|min:1|max:20|alpha_num',
            'length' => 'required|min:1|max:300|numeric',
        ]);

	$game_history=Game_History::find($request->id);
	$game_history->game_id = $request->game_id;
	$game_history->winner = $request->winner;
	$game_history->length = $request->length;
	$game_history->save();
	
	Session::flash('flash_message', 'Your changes to '.$game_history->id.' were saved.');
	return redirect('/game_histories');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

	public function delete($id){
		
		$game_history=Game_History::find($id);
		return view('game_history.delete')->with('game_history',$game_history);
		
	}

	 public function destroy($id)
    {
        # Get the game_history to be deleted
        $game_history = Game_History::find($id);
        if(is_null($game_history)) {
            Session::flash('message','game_history not found.');
            return redirect('/game_histories');
        }

		
        $game_history->delete();
        # Finish
        Session::flash('flash_message','Session '. $game_history->id.' was deleted.');
        return redirect('/game_histories');
    }
}