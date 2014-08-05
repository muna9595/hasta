<?php

class UserTest extends TestCase {

	public function testGetLogin()
	{ 
		$response = $this->call('GET', 'login');
		$this->assertTrue($response->isOk()); 
		$this->assertResponseOk();
	}
	public function testGetRegister(){
		$response=$this->call('GET','register');
		$this->assertTrue($response->isOk());
		$this->assertResponseOk();
	}
	public function testPostdologin()
	{
		// $response = $this->action('GET','UsersController@login', array(
  //           'username' => 'admin',
  //           'password' => '123',
  //       ));
  //       $this->assertTrue($response->isOk());
  //       $this->assertResponseOk();


		$correctCredentials = [
        'username' => 'admin',
        'password' => 'password'
	    ];
	    Auth::shouldReceive('attempt')
	        ->with($credentials)
	        ->andReturn(true);

	    $response=$this->action('POST', 'UsersController@login', $credentials);
	    $this->assertTrue($response->isOk());
		$this->assertResponseOk();
	}
}