<?php


Route::get('/', function()
{
	return View::make('dashboard');
});
// to handle the users login
Route::get('login', 'UsersController@login');
Route::post('login', 'UsersController@dologin');
Route::get('logout', array('uses' => 'UsersController@doLogout'));

// to handle the registration
Route::get('register', 'UsersController@register');
Route::post('register', 'UsersController@doregister');

// to activate the user
Route::get('activate/{code}', array('uses' => 'UsersController@getActivate'));

// get to user profile
Route::get('profile', 'UsersController@profilePage');

//Reset password 
Route::get('reset', 'PasswordController@reset');
Route::post('reset', 'PasswordController@doreset');

// to change password
Route::get('changepassword', 'PasswordController@changePassword');
Route::post('changepassword', 'PasswordController@dochangePassword');