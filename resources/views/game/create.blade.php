@extends('layouts.master')


@section('title', 'Game Shelf')

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
    
@endsection


@section('content')
	<h1> Lets Create a Game</h1><br>
	<hr>

		<form method='POST' action='/books'>
			{{ csrf_field() }}
			<input type='text' name='game' placeholder='Game Name'>
			<input type='text' name='rating' placeholder='Rating (1-10)'>
			<input type='text' name='type'>
			<select name='no_players'>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
			</select>
			<input type='text' name='purchase_link' placeholder='Amazon Purchase Link'>
			<input type='text' name='geek_link' placeholder='BoardGame Geek Link'>
			<input type='text' name='art' placeholder='Link to Box Image'>
			<input type='submit' placeholder='Submit'>
		</form>
	
@endsection


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    <script src="/js/books/show.js"></script>
@endsection