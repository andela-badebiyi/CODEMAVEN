<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class HomeControllerRoutesTest extends TestCase
{
    use DatabaseMigrations;

    public function testHomePage()
    {
        $res = $this->call('get', '/');
        $this->assertResponseOk();

        $this->call('get', '/allvideos');
        $this->assertResponseOk();
    }

    public function testShowUserVideos()
    {
        //create a user
    $user = factory(\App\User::class)->create([
      'name'     => 'John Doe',
      'email'    => 'j_doe@gmail.com',
      'password' => bcrypt('hayakiri'),
      'username' => 'jdoe_1',
    ]);

        $this->call('get', '/'.$user->username.'/videos');
        $this->assertResponseOk();
    //delete user
    $user->delete();
    }

    public function testSearch()
    {
        //create a user
    $user = factory(\App\User::class)->create([
      'name'     => 'John Doe',
      'email'    => 'j_doe@gmail.com',
      'password' => bcrypt('hayakiri'),
      'username' => 'jdoe_1',
    ]);

    //create two videos
    factory(\App\Video::class)->create([
      'title'   => 'learning php',
      'user_id' => $user->id,
    ]);

        factory(\App\Video::class)->create([
      'title'   => 'learning java',
      'user_id' => $user->id,
    ]);

        $this->visit('allvideos')
    ->type('java', 'query')
    ->press('Search')
    ->see('learning java')
    ->type('php', 'query')
    ->press('Search')
    ->see('learning php');

    //clean database
    $user->videos()->delete();
        $user->delete();
    }
}
