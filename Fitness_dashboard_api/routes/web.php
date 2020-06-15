<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/coach/dashboard');
});

//Route::get('index', 'RegimeController@index');

Auth::routes();

//Route::get('/test', 'RoleController@setupRoles');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'permission:edit regimes'])->group(function () {
    Route::post('/regime/edit', 'RegimeController@editRegime')->name('regimeEdit');
    Route::post('/create_regime', 'RegimeController@createRegime')->name('createRegime');
    Route::get('/delete_regime/{id}', 'RegimeController@deleteRegime')->name('deleteRegime');
});

Route::middleware(['auth', 'permission:edit exercises'])->group(function () {
    Route::get('/exercise/{id}', 'ExerciseController@getExercise')->name('getExercise');
});

Route::middleware(['auth', 'permission:edit trainee'])->group(function () {
    Route::get('/regime/{id}', 'RegimeController@getRegime')->name('getRegime');
    Route::get('/regime/{id}/edit', 'RegimeController@getEditRegime')->name('getRegimeEdit');
    Route::get('/trainee/{id}/create_regime', 'RegimeController@makeNewRegime')->name('makeNewRegime');
    Route::get('/trainee/{id}/make_setup_full_regime', 'RegimeController@makeSetUpFullRegime')->name('makeSetUpFullRegime');
    Route::post('/trainee/{id}/setup_full_regime', 'RegimeController@setUpFullRegime')->name('setUpFullRegime');
});

Route::middleware(['auth', 'permission:use dashboard'])->group(function () {
    Route::get('/coach/dashboard', 'UserController@index');
    Route::get('/coach/make_add_trainee', 'UserController@makeAddTrainee');
    Route::get('/coach/add_trainee/{id}', 'UserController@addTrainee');
    Route::get('/trainee/{id}', 'UserController@getTrainee')->name('trainee');
});
