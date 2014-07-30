<?php


Route::get('/', function()
{
	return View::make('hello');
});
// to handle the users login
Route::get('login', 'UsersController@login');
Route::post('login', 'UsersController@dologin');

// to handle the registration
Route::get('register', 'UsersController@register');
Route::post('register', 'UsersController@doregister');