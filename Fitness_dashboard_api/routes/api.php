<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', 'Api\Auth\RegisterController@register');
Route::post('login', 'Api\Auth\LoginController@login');
Route::post('refresh', 'Api\Auth\LoginController@refresh');

Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'Api\Auth\LoginController@logout');

    Route::get('regimes', 'Api\RegimeController@index');
    Route::get('/regime/{id}', 'Api\RegimeController@getRegime');
    Route::post('edit_regime', 'Api\RegimeController@editRegime');

    Route::get('/exercise/{id}', 'Api\ExerciseController@getExercise');
});
