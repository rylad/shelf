@extends('layouts.master')

@section('title')
    Edit a play session
@stop

@section('content')

    <h1>Edit {{ $game_history->id }} </h1>

    <form method='POST' action='/game_histories/{{ $game_history->id }}'>

        {{ method_field('PUT') }}

        {{ csrf_field() }}

        <input name='id' value='{{$game_history->id}}' type='hidden'>

        <div class='form-group'>
            <label>Game Played:</label>
            <select name='game_id'>
				@foreach($games_for_dropdown as $game_id => $game)
					<option
					{{ ($game_id==$game_history->game->id) ? 'SELECTED': '' }}
					value='{{$game_id}}'
					>{{ $game }}</option>
				@endforeach
			</select>
            <div class='error'>{{ $errors->first('game_id') }}</div>
        </div>


        <div class='form-group'>
            <label>Winner:</label>
            <input
            type='text'
            id='winner'
            name='winner'
            value='{{ old('winner' , $game_history->winner) }}'
            >
            <div class='error'>{{ $errors->first('winner') }}</div>
        </div>

        <div class='form-group'>
            <label>Length (in Minutes):</label>
            <input
            type='text'
            id='length'
            name='length'
            value='{{ old('length' , $game_history->length) }}'
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