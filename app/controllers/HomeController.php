<?php

class HomeController extends BaseController {

	/*	
	|	Route::get('/', 'HomeController@showWelcome');
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

}
