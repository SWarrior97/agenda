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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/event', 'eventController@create')->name('create.event');

Route::get('/getEvents/{id}','eventController@getEventosByUser');

Route::get('/getEvent/{id}','eventController@getEventByID');

Route::post('/removeEvent/{id}', 'eventController@removeEvent');