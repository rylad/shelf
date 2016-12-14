@extends('layouts.master')

@section('title')
	Add a new Game
@stop

@section('content')

    <h1>Add a new game </h1>

    <form method='POST' action='/game_histories'>

        {{ csrf_field() }}

        <div class='form-group'>
            <label>Game Played:</label>
            <select name='game_id'>
				@foreach($games_for_dropdown as $game_id => $game)
					<option
					value='{{$game_id}}'
					>{{ $game }}</option>
				@endforeach
			</select>
            <div class='error'>{{ $errors->first('game_id') }}</div>
        </div>


        <div class='form-group'>
            <label>Winner's Username (no spaces or special characters):</label>
            <input
            type='text'
            id='winner'
            name='winner'
            placeholder='Who Won?'
            >
            <div class='error'>{{ $errors->first('winner') }}</div>
        </div>

        <div class='form-group'>
            <label>Length (in Minutes):</label>
            <input
            type='text'
            id='length'
            name='length'
            placeholder='Length (Max 300 minutes)'
            >
            <div class='error'>{{ $errors->first('length') }}</div>
        </div>		


        <div class='form-instructions'>
            All fields are required
        </div>

        <button type="submit" class="btn btn-primary">Save changes</button>


        <div class='error'>
            @if(count($errors) > 0)
                Please correct the errors above and try again.
            @endif	
        </div>

    </form>


@stop