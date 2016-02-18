<?php

class AccountSettingsFeatureTest extends TestCase
{
  /**
   * A basic test example.
   *
   * @return void
   */
  public function testSettingsPage()
  {
      //create a user
      $user = factory(\App\User::class)->create([
        'name'     => 'John Doe',
        'email'    => 'j_doe@gmail.com',
        'password' => bcrypt('hayakiri'),
        'username' => 'johndoe',
        ]);

      //create settings record in database
      $settings = new \App\Settings();
      $settings->donotnotifymessage = 0;
      $settings->disablemessages = 0;
      $settings->user_id = $user->id;
      $settings->save();

      //vist page
      $this->actingAs($user)
      ->visit('/settings')
      ->see('Settings');

      $user->settings()->delete();
      $user->delete();
  }

  public function testDisableMessagingOption()
  {
      //create a user
      $user = factory(\App\User::class)->create([
        'name'     => 'John Doe',
        'email'    => 'j_doe@gmail.com',
        'password' => bcrypt('hayakiri'),
        ]);

      //create username
        $user->username = 'johndoe_1';
      $user->save();

        //create settings record in database
        $settings = new \App\Settings();
      $settings->donotnotifymessage = 0;
      $settings->disablemessages = 0;
      $settings->user_id = $user->id;
      $settings->save();

      //disable messaging
        $this->actingAs($user)
        ->visit('/settings')
        ->check('disablemessages')
        ->press('submit');

        //confirm that messaging has been disabled
        $this->visit('/'.$user->username)
        ->click('Send Message')
        ->see('This user has disabled this feature');

        //clean up database
        $user->settings()->delete();
      $user->delete();
  }

  public function testChangeUsername()
  {
    //create a user
    $user = factory(\App\User::class)->create([
      'name'     => 'John Doe',
      'email'    => 'j_doe@gmail.com',
      'password' => bcrypt('hayakiri'),
      ]);

    //create username
    $user->username = 'johndoe_1';
    $user->save();

    //create settings record in database
    $settings = new \App\Settings();
    $settings->donotnotifymessage = 0;
    $settings->disablemessages = 0;
    $settings->user_id = $user->id;
    $settings->save();

    //make request to user profile page using current username
    $this->call('get', '/johndoe_1');
    $this->assertResponseOk();

    //change username
    $this->actingAs($user)
    ->visit('/settings')
    ->type('newusername', 'username')
    ->press('submit')
    ->see('settings has been saved');

    //make call to user profile page using old username
    $this->call('get', '/johndoe_1');
    $this->assertResponseStatus(404);

    //make call to user profile page using new username
    $this->call('get', '/newusername');
    $this->assertResponseOk();

    //clean up database
    $user->settings()->delete();
    $user->delete();
  }

  public function testDeleteAccount()
  {
    //create a user
    $user = factory(\App\User::class)->create([
      'name'     => 'John Doe',
      'email'    => 'j_doe@gmail.com',
      'password' => bcrypt('hayakiri'),
      ]);

    //create settings record in database
    $settings = new \App\Settings();
    $settings->donotnotifymessage = 0;
    $settings->disablemessages = 0;
    $settings->user_id = $user->id;
    $settings->save();

    $this->actingAs($user)
    ->visit('/settings')
    ->press('Delete My Account')
    ->notSeeInDatabase('users', [
        'name'  => 'John Doe',
        'email' => 'j_doe@gmail.com',
    ]);
  }
}
