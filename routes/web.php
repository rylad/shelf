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


Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

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