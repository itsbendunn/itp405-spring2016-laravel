<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => 'web'], function(){

    Route::get('/dvds/search', 'DvdController@search');

    Route::get('/dvds/results', 'DvdController@results');

    Route::get('/dvds/create', 'DvdController@getInfo');

    Route::get('/dvds/{id}', 'DvdController@details');

    Route::post('/dvds/review', 'DvdController@create' );

    Route::post('/dvds', 'DvdController@createDvd');

    Route::get('/genres/{id}/dvds', 'GenreController@listGenre');



});



Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

