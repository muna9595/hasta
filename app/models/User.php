<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/*The database table used by the model.*/
	protected $table = 'users';

	/*The attributes excluded from the model's JSON form.*/
	protected $hidden = array('password', 'remember_token');

	// validation for login
    public static $rule = array(
	    'username'=>'required',
	    'password'=>'required|alpha_num|between:6,12',
    );

    // rule for validation of registration page
	public static $rules = array(
	    'first_name'=>'required|alpha|min:2',
	    'last_name'=>'required|alpha|min:2',
	    'email' => 'required|email|unique:users',
	    'username'=>'required|unique:users',
	    'password'=>'required|alpha_num|between:6,12|confirmed',
	    'password_confirmation'=>'required|alpha_num|between:6,12',
    );

}
