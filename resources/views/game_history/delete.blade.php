@extends('layouts.master')

@section('title')
    Confirm deletion
@endsection

@section('content')

    <h1>Don't want to tell your friends about that one eh?</h1>
    <form method='POST' action='/game_histories/{{ $game_history->id }}'>

        {{ method_field('DELETE') }}

        {{ csrf_field() }}

        <h2>Are you sure you want to delete <em>{{ $game_history->title }}</em>?</h2>

        <input type='submit' value='Yes'>
        
    </form>

@endsection