@extends('layouts.master')

@section('head')
    <link href='/css/game.css' rel='stylesheet'>
@endsection

@section('title')
    View all Games
@endsection

@section('content')

    <h1>All Your Game Sessions</h1>

    @if(sizeof($game_histories) == 0)
        You have not played any games, you can <a href='/game_histories/create'>track a session now to get started</a>.
    @else
        <div id='games' class='cf'>
            @foreach($game_histories as $game_history)

                <section class='game'>
					<img class='art' src='{{ $game_history->game->art }}' alt='Cover Art for {{ $game_history->game->art }}'>
                    <h2 class='truncate'>Played on: {{$game_history->created_at}}</h2>
					<h2 class='truncate'>Winner: {{$game_history->winner}}</h2>
					<h2 class='truncate'>Session Length: {{$game_history->length}} minutes</h2>

					



                    <a class='button' href='/game_histories/{{ $game_history->id }}/edit'><i class='fa fa-pencil' aria-hidden="true"></i> Edit</a>
                    <a class='button' href='/game_histories/{{ $game_history->id }}'><i class='fa fa-eye' aria-hidden="true"></i> View</a>
                    <a class='button' href='/game_histories/{{ $game_history->id }}/delete'><i class='fa fa-trash' aria-hidden="true"></i> Delete</a>
                </section>
            @endforeach
        </div>
    @endif

@endsection