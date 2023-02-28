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
    return view('auth.login');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/frogs', 'FrogController@index')->name('frog.index');
Route::get('/frogs/create', 'FrogController@create')->name('frog.create');
Route::post('/frogs', 'FrogController@store')->name('frog.store');
Route::get('/frogs/datatable', 'FrogController@datatable')->name('frog.datatable');
Route::put('/frogs/status/{id}', 'FrogController@status')->name('frog.status');
Route::delete('/frogs/{id}', 'FrogController@destroy')->name('frog.destroy');

Route::get('/mates', 'MateController@index')->name('mate.index');
Route::get('/mates/create', 'MateController@create')->name('mate.create');
Route::post('/mates', 'MateController@store')->name('mate.store');
Route::get('/mates/datatable', 'MateController@datatable')->name('mate.datatable');
Route::put('/mates/status/{id}', 'MateController@status')->name('mate.status');

Route::get('/weather', 'WeatherController@index')->name('weather.index');
Route::get('/weather/create', 'WeatherController@create')->name('weather.create');
Route::post('/weather', 'WeatherController@store')->name('weather.store');
Route::get('/weather/datatable', 'WeatherController@datatable')->name('weather.datatable');
