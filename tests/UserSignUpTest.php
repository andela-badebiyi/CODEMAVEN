<?php
class UserSignUpTest extends TestCase
{
  /**
   * A basic test example.
   *
   * @return void
   */
  public function testSignUpFormPage()
  {
    $this->visit('/register')
    ->see('Sign Up');
  }

  public function testSignUpWithNoData()
  {
    $this->visit('register')
    ->press('submit')
    ->see('The name field is required.')
    ->see('The email field is required.')
    ->see('The password field is required.');
  }

  public function testSignupWithInvalidEmail()
  {
    $this->visit('register')
    ->type('j_doegmail', 'email')
    ->press('submit')
    ->see('The email must be a valid email address');
  }

  public function testSignUpWithWrongPasswordConfirmation()
  {
    $this->visit('register')
    ->type('pass1234', 'password')
    ->type('pass', 'password_confirmation')
    ->press('submit')
    ->see('The password confirmation does not match.');
  }

  public function testSignUpWithCompleteData()
  {
    $this->visit('register')
    ->type('John Doe', 'name')
    ->type('j_doe@gmail.com', 'email')
    ->type('pass1234', 'password')
    ->type('pass1234', 'password_confirmation')
    ->press('submit')
    ->seePageIs('/dashboard');

    $this->seeInDatabase('users', [
      'name'  => 'John Doe',
      'email' => 'j_doe@gmail.com',
    ]);

    $user = \App\User::where('email', 'j_doe@gmail.com')->first();
    $user->settings()->delete();
    $user->delete();
  }
}
