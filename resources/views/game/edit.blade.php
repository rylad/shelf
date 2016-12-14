@extends('layouts.master')

@section('title')
    Edit {{ $game->game }}
@stop

@section('content')

    <h1>Edit {{ $game->game }} </h1>

    <form method='POST' action='/games/{{ $game->id }}'>

        {{ method_field('PUT') }}

        {{ csrf_field() }}

        <input name='id' value='{{$game->id}}' type='hidden'>

        <div class='form-group'>
            <label>Game Name:</label>
            <input
            type='text'
            id='game'
            name='game'
            value='{{ old('game', $game->game) }}'
            >
            <div class='error'>{{ $errors->first('game') }}</div>
        </div>


        <div class='form-group'>
            <label>Rating (1-10):</label>
            <select
            type='text'
            id='rating'
            name='rating'
            >
				<option value='1'> 1 </option>
				<option value='2'> 2 </option>
				<option value='3'> 3 </option>
				<option value='4'> 4 </option>
				<option value='5'> 5 </option>
				<option value='6'> 6 </option>
				<option value='7'> 7 </option>
				<option value='8'> 8 </option>
				<option value='9'> 9 </option>
				<option value='10'> 10 </option>
			</select>
            <div class='error'>{{ $errors->first('rating') }}</div>
        </div>
		
		
        <div class='form-group'>
            <label>Number of Players:</label>
            <input
            type='text'
            id='no_players'
            name='no_players'
            value='{{ old('no_players' , $game->no_players) }}'
            >
            <div class='error'>{{ $errors->first('no_players') }}</div>
        </div>
		
        <div class='form-group'>
            <label>URL to purchase this game:</label>
            <input
            type='text'
            id='purchase_link'
            name='purchase_link'
            value='{{ old('purchase_link', $game->purchase_link) }}'
            >
            <div class='error'>{{ $errors->first('purchase_link') }}</div>
        </div>

        <div class='form-group'>
            <label>Board Game Geek URL:</label>
            <input
            type='text'
            id='geek_link'
            name='geek_link'
            value='{{ old('geek_link', $game->geek_link) }}'
            >
            <div class='error'>{{ $errors->first('geek_link') }}</div>
        </div>

		
		<div class='form-group'>
            <label>URL of cover art:</label>
            <input
            type='text'
            id='art'
            name='art'
            value='{{ old('art', $game->art) }}'
            >
            <div class='error'>{{ $errors->first('art') }}</div>
        </div>

        <div class='form-group'>
            <label>Types</label>

			@foreach($types_for_checkboxes as $type_id => $type_name)
                <input
                type='checkbox'
                value='{{ $type_id }}'
                name='types[]'
                {{ (in_array($type_name, $types_for_this_game)) ? 'CHECKED' : '' }}
                >
                {{ $type_name }} <br>
            @endforeach
        </div>
		
        <div class='form-group'>
            <label>Tags</label>

			@foreach($tags_for_checkboxes as $tag_id => $tag_name)
                <input
                type='checkbox'
                value='{{ $tag_id }}'
                name='tags[]'
                {{ (in_array($tag_name, $tags_for_this_game)) ? 'CHECKED' : '' }}
                >
                {{ $tag_name }} <br>
            @endforeach
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