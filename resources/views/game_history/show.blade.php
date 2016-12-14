@extends('layouts.master')

@section('title')
    {{ $game->game }}
@endsection

@section('head')
    <link href='/css/game.css' rel='stylesheet'>
@endsection

@section('content')

    <h1 class='truncate'>{{ $game->game }}</h1>

    <h2 class='truncate'>{{ $game->type }} {{ $game->no_players }}</h2>

    <img class='cover' src='{{ $game->art }}' alt='Cover for {{$game->game}}'>

    <div class='tags'>
        @foreach($game->tags as $tag)
            <div class='tag'>{{ $tag->game }}</div>
        @endforeach
    </div>

    <a class='button' href='/games/{{ $game->id }}/edit'><i class='fa fa-pencil'></i> Edit</a>
    <a class='button' href='/games/{{ $game->id }}/delete'><i class='fa fa-trash'></i> Delete</a>

    <br><br>
    <a class='return' href='/games'>&larr; Return to all games</a>

@endsection