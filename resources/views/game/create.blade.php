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
            placeholder='Game Name'
            >
            <div class='error'>{{ $errors->first('game') }}</div>
        </div>


        <div class='form-group'>
            <label>Rating:</label>
            <input
            type='text'
            id='rating'
            name='rating'
            placeholder='Rating'
            >
            <div class='error'>{{ $errors->first('rating') }}</div>
        </div>
		
        <div class='form-group'>
            <label>Number of Players:</label>
            <input
            type='text'
            id='no_players'
            name='no_players'
            placeholder='# of Players'
            >
            <div class='error'>{{ $errors->first('no_players') }}</div>
        </div>
		
        <div class='form-group'>
            <label>URL to purchase this game:</label>
            <input
            type='text'
            id='purchase_link'
            name='purchase_link'
            placeholder='Purchase Link'
            >
            <div class='error'>{{ $errors->first('purchase_link') }}</div>
        </div>

        <div class='form-group'>
            <label>Board Game Geek URL:</label>
            <input
            type='text'
            id='geek_link'
            name='geek_link'
            placeholder='Board Game Geek URL'
            >
            <div class='error'>{{ $errors->first('geek_link') }}</div>
        </div>

		
		<div class='form-group'>
            <label>URL of cover art:</label>
            <input
            type='text'
            id='art'
            name='art'
            placeholder='art'
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