<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::auth();

Route::get('/messages', 'MessageController@index');
Route::post('/message', 'MessageController@store');
Route::delete('/message/{message}', 'MessageController@destroy');

Route::get('messages/{message}', 'MessageController@show');

Route::get('messages/{message}/edit','MessageController@edit');
Route::patch('messages/{message}', 'MessageController@update');

Route::post('messages/{message}/notes', 'NotesController@store');
