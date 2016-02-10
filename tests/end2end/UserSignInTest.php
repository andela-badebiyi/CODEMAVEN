<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserSignInTest extends TestCase
{
    public function testSignInLinkWhenSignedIn()
    {
      $user = factory(\App\User::class)->create([
				'name' => 'John Doe',
				'email' => 'j_doe@gmail.com',
				'password' => bcrypt('hayakiri')
			]);

      $this->actingAs($user)
      ->visit('/login')
      ->seePageIs('/')
      ->visit('/register')
      ->seePageIs('/');

      $user->delete();
    }

    public function testSignInFormPage()
    {
    	$this->visit('/login')
    	->see('Sign In');
    }

    public function testSignInWithNoData()
    {
    	$this->visit('/login')
    	->press('login')
  		->see('The email field is required.')
      ->see('The password field is required.');
    }

		public function testWithCompleteData()
		{
			$user = factory(\App\User::class)->create([
				'name' => 'John Doe',
				'email' => 'j_doe@gmail.com',
				'password' => bcrypt('hayakiri')
			]);

			$this->visit('/login')
			->type('j_doe@gmail.com', 'email')
			->type('hayakiri', 'password')
    	->press('login')
			->seePageIs('/dashboard');

			$user->delete();
		}

    public function testForgotPasswordLink()
    {
      $this->visit('/login')
			->click('Forgot password')
      ->see('Forgot Password');
    }

    public function testSocialSignInLinks()
    {
      //make requests and confirm redirection
      $this->call('get', '/login/facebook');
      $this->assertResponseStatus(302);

      $this->call('get', '/login/github');
      $this->assertResponseStatus(302);

      $this->call('get', '/login/twitter');
      $this->assertResponseStatus(302);
    }
}
