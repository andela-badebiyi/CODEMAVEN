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

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/allvideos', 'HomeController@allVideos');

    Route::get('/', 'HomeController@index');

    Route::get('/callback/{provider}', 'AccountController@callback');

    Route::get('/login/{provider}', 'AccountController@socialAuth');

    Route::resource('videos', 'VideoController'
    );

    Route::get('/dashboard', 'UserController@getDashboard');

    Route::get('/profile', 'UserController@getProfile');

    Route::post('/profile', 'UserController@postProfile');

    Route::get('/video/{id}/like', 'LikeController@like');

    Route::post('/video/{id}/comment', 'CommentController@store');

    Route::post('/video/{id}/{comment_id}/reply', 'CommentController@storeReply');
});
