<?php


class UserDashboardTest extends TestCase
{
  /**
   * A basic test example.
   *
   * @return void
   */
  public function testDashboardPageWithoutSigingIn()
  {
    $this->call('get', '/dashboard');
    $this->assertResponseStatus(403);
  }

  public function testDashboardAndLinksOnPage()
  {
    $user = factory(\App\User::class)->create([
        'name'     => 'John Doe',
        'email'    => 'j_doe@gmail.com',
        'password' => bcrypt('hayakiri'),
    ]);

    $settings = new \App\Settings();
    $settings->donotnotifymessage = 0;
    $settings->disablemessages = 0;
    $settings->user_id = $user->id;
    $settings->save();

    $this->actingAs($user)
    ->visit('/dashboard')
    ->see('dashboard')
    ->click('Videos')
    ->see('My Videos')
    ->seePageIs('/videos')
    ->click('Messages')
    ->see('messages')
    ->seePageIs('/messages')
    ->click('My Profile')
    ->seePageIs('/profile')
    ->click('Account Settings')
    ->seePageIs('/settings');

    $user->settings()->delete();
    $user->delete();
  }
}
