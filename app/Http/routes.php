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

    Route::get('/messages', 'MessageController@showMessages');

    Route::get('/messages/{id}', 'MessageController@displayMessage');

    Route::delete('/messages/{id}', 'MessageController@destroy');

    Route::post('/messages/reply', 'MessageController@sendReply');

    Route::get('/video/{id}/like', 'LikeController@like');

    Route::post('/video/{id}/comment', 'CommentController@store');

    Route::post('/video/{id}/{comment_id}/reply', 'CommentController@storeReply');

    Route::post('/search', 'HomeController@searchVideos');

    Route::get('/{username}', 'HomeController@userprofile');

    Route::get('/{username}/videos', 'HomeController@uservideos');

    Route::get('/{username}/messages', 'MessageController@create');

    Route::post('/{username}/messages', 'MessageController@store');
});
