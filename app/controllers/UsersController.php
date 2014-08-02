<?php

class UsersController extends BaseController {
	// to redirect to login page
	public function login()
	{
		return View::make('users.login');
	}
	public function reset()
	{
		return View::make('users.reset');
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
				// Check user account is activated or not
				if(!Auth::user()->active) 
				{
	        		Auth::logout();
	        		return Redirect::to('login')->with('message', 'You have not activated your account');
		   		 }		   		 
		   		 else
		   		 {
		   		 	// If activate redirect to profile page
		   		 	return Redirect::intended('profile');
		   		 }	   		 
			}
			else
			{	
				//If not register redirect to login page
				return Redirect::to('login')->withErrors($validator);
			}						
		}		
	}
	// Logged user to their profile
	public function profilePage(){
		// allow only logged in user to view profile page.
		if (Auth::check())
		{
		    return View::make('pages.profile');
		}		
		else
		{
			// if user is not logged in then redirect to login page.
			return Redirect::to('login');
		}
		
	}

	// To perform logout
	public function doLogout()
	{
		Auth::logout(); // log the user out of our application
		return Redirect::to('login'); // redirect the user to the login screen
	}

	// function to redirect to register page
	public function register()
	{
		return View::make('users.register');
	}

	// function to perform registration
	public function doregister(){
		// validate the user input.
		$validator=Validator::make(Input::all(),User::$rules);

		if($validator->passes())
		{   
			// Begin of transaction.
			DB::beginTransaction();
			try
			{
				// get the user inputs and save it to database
				$user = new User;//Create a new instance of user
		        $user->first_name = Input::get('first_name');
			    $user->last_name = Input::get('last_name');
			    $user->email = Input::get('email');
		        $user->username = Input::get('username');		    
			    $user->password = Hash::make(Input::get('password')); 
			    $user->code = str_random(60);							// To generate some random numbar
			    $user->active=0;
			    $user->user_type=0;									
			    $user->save();
			    // Send mail to user account with activation link and message
			    // $data = array(
			    //     'email'     => Input::get('email'),
			    //     'username'=>Input::get('username')
			    // );
			    Mail::send('emails.auth.welcome', array('link'=>URL::to('activate',$user->code),'username'=>Input::get('username')), function($message){
			        $message->to(Input::get('email'), Input::get('first_name').' '.Input::get('last_name'))->subject('Welcome to the IET-Scholarship!');
			    });
			    // commit if registration is done and activation mail sent to the user email address 
			    DB::commit();
			    // After commit redirect to login page
			    return Redirect::to('login')->with('message', 'Thanks for registering! An activation link has been sent to your email address. please activate your account');
			}
			catch (\Exception $e)
			{
				// If either user data not saved or activation link is not send to user email address, then rollback
   				 DB::rollback();
   				 return Redirect::to('register')->with('message', 'Unable to register! Please check your internet connection');
   			}
		    
		}
		else
		{
			// if validation fails redirect to register page with the errors.
			return Redirect::to('register')->withErrors($validator);
		}
	}

	// Function to perform activation of user account
    public function getActivate($code)
    {
    	$user=User::where('code','=',$code)->where('active','=',0);
    	if($user->count())
    	{
    		$user=$user->first();
    		$user->active=1;			//Update the active column
    		// $user->code='';				//Update the code column
    		if($user->save())			//update user table
    		{
    			//Activate if not activated redirect to login page
    			return Redirect::to('login')->with('message','Your account is successfully activated!, you can now login!');
    		}
    		else
    		{
    			//Error in activation
    			return Redirect::to('login')->with('message','We could not activate your account, Please try latter');
    		}
    	}
    	//Account already activated message
    	return Redirect::to('login')->with('message','You have already activated your account ');
    }

}