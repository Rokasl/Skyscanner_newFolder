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
Route::resource('/', 'IndexController');
Route::get('/s/{id}', 'IndexController@showGroup');

Route::resource('/result', 'ResultController');

Route::group(['middleware' => ['web']], function () {
    Route::post('/comment', 'CommentsController@store');
});

Route::post('/api/add-vote', 'ApiController@addVoteForFlight');
Route::get('/api/search-destination', 'ApiController@showDestinations');
Route::post('/api/refresh', 'ApiController@getResultsViewHtml');
