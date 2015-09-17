<?php

Route::get('/', function () 
{
/*
	$user = new App\User();
	$user->truncate();

	$user->name = 'Fernando';
	$user->email = 'fernandoalugo@gmail.com';
	$user->password = Hash::make('123');

	$user->save();
*/
    return Redirect::route('woo');
});

Route::get('/confirm', function(){

	return view('confirm');
});

Route::get('woo',
	[
		'as' => 'woo',
		'uses' => 'HomeController@index',
		'middleware' => 'auth'
	]);

Route::group(['prefix' => 'auth'], function () 
{	
	Route::get('login', 
	[
		'as' => 'login', 
		'uses' => 'Auth\AuthController@getLogin'
	]);

	Route::post('login', 
	[
		'as' => 'postLogin', 
		'uses' => 'Auth\AuthController@postLogin'
	]);

	Route::get('logout', 
	[
		'as' => 'logout', 
		'uses' => 'Auth\AuthController@getLogout'
	]);

	Route::get('register', 
	[
		'as' => 'getRegister', 
		'uses' => 'Auth\AuthController@getRegister'
	]);

	Route::post('register', 
	[
		'as' => 'postRegister', 
		'uses' => 'Auth\AuthController@postRegister'
	]);

	Route::get('password/email', 
	[
		'as' => 'getPasswordEmail',
		'uses' => 'Auth\PasswordController@getEmail'
	]);

	Route::post('password/email',
	[
		'as' => 'postPasswordEmail',
		'uses' => 'Auth\PasswordController@postEmail'
	]);

	Route::get('password/reset/{token}', 
	[
		'as' => 'getResetToken',
		'uses' => 'Auth\PasswordController@getReset'

	]);

	Route::post('password/reset',
	[
		'as' => 'postRest',
		'uses' => 'Auth\PasswordController@postReset'
	]);



});


	Route::get('emails/confirm/{id}',
	[
		'as' => 'verifyToken',
		'uses' => 'Auth\AuthController@postVerifyToken'
	]);
