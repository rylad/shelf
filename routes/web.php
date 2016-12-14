<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::resource('/', 'PageController@welcome');


Route::get('/games', 'GameController@index')->name('games.index')->middleware('auth');
# Show a form to create a new game
Route::get('/games/create', 'GameController@create')->name('games.create')->middleware('auth');
# Process the form to create a new game
Route::post('/games', 'GameController@store')->name('games.store')->middleware('auth');
# Show an individual game
Route::get('/games/{title}', 'GameController@show')->name('games.show');
# Show form to edit a game
Route::get('/games/{id}/edit', 'GameController@edit')->name('games.edit')->middleware('auth');
# Process form to edit a game
Route::put('/games/{id}', 'GameController@update')->name('games.update')->middleware('auth');
# Get route to confirm deletion of game
Route::get('/games/{id}/delete', 'GameController@delete')->name('games.destroy')->middleware('auth');
# Delete route to actually destroy the game
Route::delete('/games/{id}', 'GameController@destroy')->name('games.destroy')->middleware('auth');


Route::get('/game_histories', 'Game_HistoryController@index')->name('game_histories.index')->middleware('auth');
# Show a form to create a new game_histories
Route::get('/game_histories/create', 'Game_HistoryController@create')->name('game_histories.create')->middleware('auth');
# Process the form to create a new game_histories
Route::post('/game_histories', 'Game_HistoryController@store')->name('game_histories.store')->middleware('auth');
# Show an individual game_histories
Route::get('/game_histories/{title}', 'Game_HistoryController@show')->name('game_histories.show');
# Show form to edit a game_histories
Route::get('/game_histories/{id}/edit', 'Game_HistoryController@edit')->name('game_histories.edit')->middleware('auth');
# Process form to edit a game_histories
Route::put('/game_histories/{id}', 'Game_HistoryController@update')->name('game_histories.update')->middleware('auth');
# Get route to confirm deletion of game_histories
Route::get('/game_histories/{id}/delete', 'Game_HistoryController@delete')->name('game_histories.destroy')->middleware('auth');
# Delete route to actually destroy the game_histories
Route::delete('/game_histories/{id}', 'Game_HistoryController@destroy')->name('game_histories.destroy')->middleware('auth');



if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database shelf');
        DB::statement('CREATE database shelf');

        return 'Dropped shelf; created shelf.';
    });

};

Route::get('/show-login-status', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user)
        dump($user->toArray());
    else
        dump('You are not logged in.');

    return;
});

Auth::routes();
Route::get('/logout','Auth\LoginController@logout')->name('logout');