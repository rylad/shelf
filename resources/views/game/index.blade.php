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
	<h1> What you like to do?</h1><br>
	<hr>

	<li><a href='/games'>View All Games</a></li>
	<li><a href='/games/create'>Add a Game</a></li>
	<li><a href='/game/{id}/edit'>Change a Game</a></li>
	<li><a href='/game/{id}/delete'>Delete a Game</a></li>
	<li><a href='/game/session'>Track a Game Session</a></li>
@endsection


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    <script src="/js/books/show.js"></script>
@endsection