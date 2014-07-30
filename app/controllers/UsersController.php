<?php

class UsersController extends BaseController {

	public function login()
	{
		return View::make('users.login');
	}
	public function dologin()
	{
		$validator = Validator::make(Input::all(), User::$rule);
		if($validator->fails()){
			return Redirect::to('login')->withErrors($validator);	
		}
		else{
			return View::make('users.register');
		}
		
	}
	public function register()
	{
		return View::make('users.register');
	}
	public function doregister(){
		$validator=Validator::make(Input::all(),User::$rules);

		if($validator->passes())
		{
			$user = new User;//Create a new instance of user
	        $user->first_name = Input::get('first_name');
		    $user->last_name = Input::get('last_name');
		    $user->email = Input::get('email');
	        $user->username = Input::get('username');		    
		    $user->password = Hash::make(Input::get('password')); 
		    $user->code=str_random(60);							// To generate some random numbar
		    $user->active=0;
		    $user->user_type=0;									
		    $user->save();
		    return Redirect::to('login')->with('message', 'Thanks for registering!');
		}
		else
		{
			return Redirect::to('register')->withErrors($validator);
		}
	}
}