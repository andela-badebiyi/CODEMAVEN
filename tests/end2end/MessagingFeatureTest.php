<?php

class MessagingFeatureTest extends TestCase
{
  /**
   * A basic test example.
   *
   * @return void
   */
  public function testSendMessageWithIncompleteData()
  {
    //create a user
    $user = factory(\App\User::class)->create([
      'name'     => 'John Doe',
      'email'    => 'j_doe@gmail.com',
      'password' => bcrypt('hayakiri'),
    ]);

    //set username
    $user->username = 'johndoe_1';
      $user->save();

    //set user settings
    $settings = new \App\Settings();
      $settings->user_id = $user->id;
      $settings->save();

    //sendMessage with empty fields
    $this->visit('/'.$user->username)
    ->click('Send Message')
    ->press('Send Message')
    ->see('The name field is required.')
    ->see('The subject field is required.')
    ->see('The email field is required.')
    ->see('The message field is required.');

    //send message with incorrect email format
    $this->visit('/'.$user->username)
    ->click('Send Message')
    ->type('Jennifer Garner', 'name')
    ->type('asas', 'email')
    ->type('Hello', 'subject')
    ->type('message body', 'message')
    ->press('Send Message')
    ->see('The email must be a valid email address.');

    //clean up database
    $settings->delete();
    $user->delete();
  }

  public function testMessageDelete()
  {
    //create a user
    $user = factory(\App\User::class)->create([
      'name'  => 'John Doe',
      'email' => 'j_doe@gmail.com',
    ]);

    //create a message for user
    $message = factory(\App\Message::class)->create([
      'reciever_id' => $user->id,
    ]);

    //delete message
    $this->actingAs($user)
    ->visit('/messages')
    ->click($message->sender_name)
    ->press('Delete message')
    ->dontSee($message->sender_name)
    ->notSeeInDatabase('messages', [
      'reciever_id' => $user->id,
    ]);

    //clean up database
    $user->delete();
  }
}
