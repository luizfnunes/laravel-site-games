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

Route::get('/', 'GameController@index');
Route::get('/game/{id}', 'GameController@show');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/auth', 'AuthController@autenticate')->name('auth');
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', 'AuthController@index')->name('dashboard.index');
    Route::post('/logout', 'AuthController@logout')->name('dashboard.logout');
});
