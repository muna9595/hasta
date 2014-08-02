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
	public function testGetLogout(){
		$crawler = $this->client->request('GET', 'logout');
		$this->assertTrue($this->client->getResponse()->isOk());
	}
}