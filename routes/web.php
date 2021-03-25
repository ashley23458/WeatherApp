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

Route::get('/', 'WeatherController@index')->name('current_weather');
Route::post('/search/location', 'WeatherController@search')->name('search');
Route::get('/{city}', 'WeatherController@filter')->name('filter');