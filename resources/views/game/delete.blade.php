@extends('layouts.master')

@section('title')
    Confirm deletion: {{ $game->title }}
@endsection

@section('content')

    <h1>It is always sad when you get rid of a good one, but here is to having more space!</h1>
    <form method='POST' action='/games/{{ $game->id }}'>

        {{ method_field('DELETE') }}

        {{ csrf_field() }}

        <h2>Are you sure you want to delete <em>{{ $game->title }}</em>?</h2>

        <input type='submit' value='Yes'>
        
    </form>

@endsection