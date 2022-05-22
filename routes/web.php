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


Route::group(['namespace' => 'App\Http\Controllers\Movies', 'as' => 'movies', 'prefix' => 'movies'], function(){
    Route::get('/', 'MoviesController@index')->name('.index');
    Route::get('/{movie}', 'MoviesController@show')->name('.show');
    Route::post('/rent/{movie}', 'MoviesController@rent')->name('.rent')->middleware(['auth']);
});


require __DIR__.'/auth.php';
