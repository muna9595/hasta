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