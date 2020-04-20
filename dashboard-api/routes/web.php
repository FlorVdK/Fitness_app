<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/coach/dashboard', 'UserController@index');

Route::middleware(['auth'])->group(function () {

    Route::get('/coach/dashboard', 'UserController@index');
    Route::get('/trainee/{id}', 'UserController@getTrainee')->name('trainee');


    Route::get('/exercise/{id}', 'ExerciseController@getExercise')->name('getExercise');


    Route::get('/regime/{id}', 'RegimeController@getRegime')->name('getRegime');
    Route::get('/regime/{id}/edit', 'RegimeController@getRegimeEdit')->name('getRegimeEdit');
    Route::get('/trainee/{id}/create_regime', 'RegimeController@makeNewRegime')->name('makeNewRegime');

    Route::post('/regime/edit', 'RegimeController@regimeEdit')->name('regimeEdit');
    Route::post('/create_regime', 'RegimeController@createRegime')->name('createRegime');
});
