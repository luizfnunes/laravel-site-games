<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
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
Route::get('/game/{id}', 'GameController@show')->name('game');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/auth', 'AuthController@autenticate')->name('auth');
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard/create', 'GameController@create')->name('dashboard.create');
    Route::get('/dashboard/edit/{id}', 'GameController@edit')->name('dashboard.edit');
    Route::get('/dashboard/{page?}', 'GameController@list')->name('dashboard.index');
    Route::post('/logout', 'AuthController@logout')->name('dashboard.logout');
    Route::post('/dashboard/store', 'GameController@store')->name('dashboard.store');
    Route::post('/dashboard/update', 'GameController@update')->name('dashboard.update');
    Route::post('/dashboard/destroy', 'GameController@destroy')->name('dashboard.destroy');
});
Route::get('/{page?}', 'GameController@index')->name('index');
