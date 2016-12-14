<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Game;
use App\Tag;
use App\Type;
use Session;

class PageController extends Controller
{
    public function welcome(Request $request){
		
		if($request->user()){
			return redirect('/games');
		}
		
		return view('page.welcome');
		
	}
}
