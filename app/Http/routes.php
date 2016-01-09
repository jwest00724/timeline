<?php

/* Application Routes */

Route::group(['middleware' => ['web']], function () {
	
	Route::get('/editRelationships', 'RelationshipController@editForm');
	Route::get('/editEvent/{id}', 'EventController@editForm');
	Route::get('/editMedia/{id}', 'MediaController@editForm');
	Route::get('/deleteMedia/{id}', 'MediaController@delete');
	Route::get('/deleteEvent/{id}', 'EventController@delete');
	Route::get('/newEvent', 'EventController@createForm');
	Route::get('/newMedia', 'MediaController@createForm');
	Route::get('/showMedia/{id}', 'MediaController@show');
	Route::get('/showEvent/{id}', 'EventController@show');
    Route::get('/', 'TimelineController@index');
		
	Route::post('/editRelationships/delete/{eventID}/{mediaID}', 'RelationshipController@delete');
	Route::post('/editRelationships/newMedia/{eventID}', 'RelationshipController@newMedia');
	Route::post('/editRelationships/newEvent/{mediaID}', 'RelationshipController@newEvent');
	Route::post('/editEvent/{id}', 'EventController@edit');
	Route::post('/editMedia/{id}', 'MediaController@edit');
	Route::post('/newEvent', 'EventController@create');
	Route::post('/newMedia', 'MediaController@create');
	
});
