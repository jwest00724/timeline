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

//

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

Route::group(['middleware' => ['web']], function () {
	
    Route::get('/', 'TimelineController@index');
	Route::get('/newEvent', 'EventController@createForm');
	Route::post('/newEvent', 'EventController@create');
	Route::get('/newMedia', 'MediaController@createForm');
	Route::post('/newMedia', 'MediaController@create');
	Route::get('/editEvent/{id}', 'EventController@editForm');
	Route::post('/editEvent/{id}', 'EventController@edit');
	Route::get('/editMedia/{id}', 'MediaController@editForm');
	Route::post('/editMedia/{id}', 'MediaController@edit');
	Route::get('/editRelationships', 'RelationshipController@editForm');
	Route::post('/editRelationships/delete/{eventID}/{mediaID}', 'RelationshipController@delete');
	Route::post('/editRelationships/newMedia/{eventID}', 'RelationshipController@newMedia');
	Route::post('/editRelationships/newEvent/{mediaID}', 'RelationshipController@newEvent');
	Route::get('/showMedia/{id}', 'TimelineController@showMedia');
	Route::get('/showEvent/{id}', 'TimelineController@showEvent');
	
});
