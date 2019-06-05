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

Route::get('/', 'QuizController@index');
Route::get('/quiz/{id}', 'QuizController@getCode')->where('id', '[0-9]+');
Route::post('/quiz/start', 'QuizController@start')->name('/quiz/start');
Route::get('test', function () {
    event(new App\Events\NewQuestion('Someone'));
    return "Event has been sent!";
});
