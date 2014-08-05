<?php

class PasswordController extends BaseController {
	// to redirect to reset password page
	public function reset(){
		return View::make('users.reset');
	}


	// to reset password
	public function doreset(){
		$validator=Validator::make(Input::all(),User::$reset);
		if($validator->passes()){
			
			$email=Input::get('email');			
			$user=User::where('email','=',$email);

	    	if($user->count())
	    	{
	    		$password=str_random(6);
	    		$user=$user->first();
	    		$user->password=Hash::make($password);
	    		$user->save();
	    		$username = DB::table('users')->where('email','=',$email)->pluck('username');

	    		 Mail::send('emails.auth.reminder', array('password'=>$password,'username'=>$username),function($message){
			        $message->to(Input::get('email'))->subject('Reset Password for IET-Scholarship!');
			    });

	    		return Redirect::to('login')->with('message', 'An email with reset password have been sent to your email address');
	    	} 
			else{
				return Redirect::to('reset')->with('message', 'You are not registered user');
			}
		}
		else{
			return Redirect::to('reset')->withErrors($validator);
		}	
	}

// change password
	public function changePassword(){
		if (Auth::check()){
			return View::make('users.change-password');
		}
		else{
			return Redirect::to('login');
		}
	}

// change the password
	public function dochangePassword(){
		if (Auth::check()){
			$validator=Validator::make(Input::all(),User::$changepassword);
			if($validator->passes())
			{ 
				$email = Auth::user()->email;
				$username = Auth::user()->username;

				$user=User::where('email','=',$email);
				if($user->count())
		    	{
		    		$user=$user->first();
		    		$user->password=Hash::make(Input::get('password'));
		    		$user->save();
		    		return View::make('pages.profile')->with('message', 'Password changed successfully');
		    	}
		    	else{
		    		return View::make('users.change-password')->with('message', 'Something went wrong!');
		    	}
			}
		}
		else{
			return Redirect::to('login');
		}
	}
}