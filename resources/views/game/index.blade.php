@extends('layouts.master')

@section('head')
    <link href='/css/game.css' rel='stylesheet'>
@endsection

@section('title')
    View all Games
@endsection

@section('content')

    <h1>All Your Games</h1>

    @if(sizeof($games) == 0)
        You have not added any games, you can <a href='/games/create'>add a game now to get started</a>.
    @else
        <div id='games' class='cf'>
            @foreach($games as $game)

                <section class='game'>
                    <a href='/games/{{ $game->id }}'><h2 class='truncate'>{{ $game->game }}</h2></a>

                    <a href='/games/{{ $game->id }}'><img class='art' src='{{ $game->art }}' alt='Cover Art for {{ $game->game }}'></a>
					<h2 class='truncate'>Max Players: {{$game->no_players}}</h2>
					<h2 class='truncate'>Rating: {{$game->rating}}</h2>					

                    <div class='tags'>
                        @foreach($game->tags as $tag)
                            <div class='tag'>{{ $tag->name }}</div>
                        @endforeach
						@foreach($game->types as $type)
							<div class='tag'>{{ $type->name }}</div>
						@endforeach
                    </div>

                    <a class='button' href='/games/{{ $game->id }}/edit'><i class='fa fa-pencil' aria-hidden="true"></i> Edit</a>
                    <a class='button' href='/games/{{ $game->id }}'><i class='fa fa-eye' aria-hidden="true"></i> View</a>
                    <a class='button' href='/games/{{ $game->id }}/delete'><i class='fa fa-trash' aria-hidden="true"></i> Delete</a>
					<a class='button' href='/game_histories'><i class='fa fa-sticky-note-o' aria-hidden="true"></i> Log</a>
                </section>
            @endforeach
        </div>
    @endif

@endsection