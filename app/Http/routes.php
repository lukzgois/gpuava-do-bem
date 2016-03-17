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

//TODO: organize this hell of routes
Route::group(['middleware' => ['web']], function () {
	Route::group(['middleware' =>['auth'], 'prefix' => 'admin'], function() {
        Route::get('/', 'DashboardController@index');
		Route::get('/users', 'UsersController@index');

        Route::group(['prefix' => 'api', 'namespace' => 'Api'], function() {
            Route::get('/users', 'UsersController@index');
            Route::post('/users', 'UsersController@store');
            Route::put('/users/{id}', 'UsersController@update');
        });
	});

	Route::get('/login', 'AuthController@loginForm');
	Route::post('/login', 'AuthController@login');
    Route::get('/logout', 'AuthController@logout');

    Route::get('/', function () {
    	return "Yeah, azk is ok. Go Work!";
	});
});
