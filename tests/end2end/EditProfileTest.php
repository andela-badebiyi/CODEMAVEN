<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EditProfileTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEditProfilePage()
    {
    	//create a user
      $user = factory(\App\User::class)->create([
        'name' => 'John Doe',
        'email' => 'j_doe@gmail.com',
        'password' => bcrypt('hayakiri'),
    	]);

      //set username
    	$user->username = 'johndoe_1';
    	$user->save();

      //update profile
      $this->actingAs($user)
      ->visit('/profile')
      ->type('Jane Doe', 'name')
      ->type('1991-01-01', 'dob')
      ->type('Web Developer', 'occupation')
      ->type('Yaba, Lagos', 'location')
      ->type('Java', 'favstack')
      ->type('Live, Love, Learn...', 'bio')
      ->press('Save Details')
      ->see('Update Successful!');

      //check profile page to confirm update
      $this->visit('/'.$user->username)
      ->see('Jane Doe')
      ->see('1991-01-01')
      ->see('Web Developer')
      ->see('Yaba, Lagos')
      ->see('Java')
      ->see('Live, Love, Learn');

      //clean up database
      $user->delete();
    }
}
