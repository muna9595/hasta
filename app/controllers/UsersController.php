<?php

class UsersController extends BaseController {
	// to redirect to login page
	public function login()
	{
		return View::make('users.login');
	}

	// function to perform login
	public function dologin()
	{
		$validator = Validator::make(Input::all(), User::$rule);
		if($validator->fails()){
			return Redirect::to('login')->withErrors($validator);	
		}
		else
		{
			//chack user is register or not
			$auth=Auth::attempt(array(
			'username'=>Input::get('username'),
			'password'=>Input::get('password'),						
			));
			// If register
			if($auth)
			{	
				// If activate redirect to home page
		   		return Redirect::intended('/');		   		 
			}
			else
			{	
				//If not register redirect to login page
				return Redirect::to('login')->withErrors($validator);
			}						
		}		
	}

	// To perform logout
	public function doLogout()
	{
		Auth::logout(); // log the user out of our application
		return Redirect::to('login'); // redirect the user to the login screen
	}

	// function to redirect to login page
	public function register()
	{
		return View::make('users.register');
	}

	// function to perform registration
	public function doregister(){
		$validator=Validator::make(Input::all(),User::$rules);

		if($validator->passes())
		{   
			// get the user inputs and save it to database

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
			// if validation fails redirect to register page with the errors.
			return Redirect::to('register')->withErrors($validator);
		}
	}
}