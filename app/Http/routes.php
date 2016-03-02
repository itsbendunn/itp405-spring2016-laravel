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


Route::group(['prefix' =>'api/v1', 'namespace' =>'API'], function(){
    Route::get('genres', 'GenreController@index');

    Route::get('genres/{id}', 'GenreController@show');

    Route::post('dvds', 'DvdController@store');

    Route::get('dvds', 'DvdController@index');

    Route::get('dvds/{id}','DvdController@show');



});

Route::group(['middleware' => 'web'], function(){

    Route::get('/dvds/search', 'DvdController@search');

    Route::get('/dvds/results', 'DvdController@results');

    Route::get('/dvds/create', 'DvdController@getInfo');

    Route::get('/dvds/{id}', 'DvdController@details');

    Route::post('/dvds/review', 'DvdController@create' );

    Route::post('/dvds', 'DvdController@createDvd');

    Route::get('/genres/{id}/dvds', 'GenreController@listGenre');

});

use App\Services\API\BestBuy;

Route::get('/bestbuy/{searchTerm}', function($searchTerm){
    $BestBuy = new BestBuy([
        'accessToken' => '9ybcmx2ymwhzuqgwbuq2un9u'
    ]);

    $productList = $BestBuy->search($searchTerm);

    return view('bestbuy', [
        'productList' =>$productList
    ]);
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

