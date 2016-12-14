@extends('layouts.master')

@section('title')
	Add a new Game
@stop

@section('content')

    <h1>Add a new game </h1>

    <form method='POST' action='/games'>

        {{ csrf_field() }}

        <div class='form-group'>
            <label>Game Name:</label>
            <input
            type='text'
            id='game'
            name='game'
            value={{old('game', 'Splendor')}}
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
            <label>Number of Players (max: 20):</label>
            <input
            type='text'
            id='no_players'
            name='no_players'
            value={{old('no_players', '4')}}
            >
            <div class='error'>{{ $errors->first('no_players') }}</div>
        </div>
		
        <div class='form-group'>
            <label>URL to purchase this game:</label>
            <input
            type='text'
            id='purchase_link'
            name='purchase_link'
            value={{old('purchase_link', 'https://www.amazon.com/Asmodee-SCSPL01-Splendor-Board-Game/dp/B00IZEUFIA')}}
            >
            <div class='error'>{{ $errors->first('purchase_link') }}</div>
        </div>

        <div class='form-group'>
            <label>Board Game Geek URL:</label>
            <input
            type='text'
            id='geek_link'
            name='geek_link'
            value={{old('geek_link', 'https://boardgamegeek.com/boardgame/148228/splendor')}}
            >
            <div class='error'>{{ $errors->first('geek_link') }}</div>
        </div>

		
		<div class='form-group'>
            <label>URL of cover art:</label>
            <input
            type='text'
            id='art'
            name='art'
            value={{old('art', 'https://cf.geekdo-images.com/images/pic1904079.jpg')}}
            >
            <div class='error'>{{ $errors->first('art') }}</div>
        </div>

        <div class='form-group'>
            <label>Types</label><br>

			@foreach($types_for_checkboxes as $type_id => $type_name)
                <input
                type='checkbox'
                value='{{ $type_id }}'
                name='types[]' >{{ $type_name}} <br>
			@endforeach
        </div
		
        </div>
		
        <div class='form-group'>
            <label>Tags</label><br>

			@foreach($tags_for_checkboxes as $tag_id => $tag_name)
                <input
                type='checkbox'
                value='{{ $tag_id }}'
                name='tags[]' >{{ $tag_name}} <br>
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