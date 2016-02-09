<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DB;

class UserVideoFeatureTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testAddNewVideoWithNoData()
    {
      $user = factory(\App\User::class)->create([
  				'name' => 'John Doe',
  				'email' => 'j_doe@gmail.com',
  				'password' => bcrypt('hayakiri')
  			]);

      $this->actingAs($user)
      ->visit('/videos')
      ->click('Upload New Video')
      ->press('submit')
      ->see('The title field is required')
      ->see('The description field is required.')
      ->see('The category field is required.')
      ->see('The url field is required.')
      ->seePageIs('/videos/create');

      $user->delete();
    }

    public function testAddNewVideoWithInvalidYoutubeUrl()
    {
      $user = factory(\App\User::class)->create([
          'name' => 'John Doe',
          'email' => 'j_doe@gmail.com',
          'password' => bcrypt('hayakiri')
        ]);

      $this->actingAs($user)
      ->visit('/videos')
      ->click('Upload New Video')
      ->type('Learning Laravel', 'title')
      ->type('A brief introduction to laravel', 'description')
      ->type('Laravel, php, mvc, framework', 'category')
      ->type('http://yakata.com', 'url')
      ->press('submit')
      ->see('This is an invalid youtube url');

      \App\Video::where('url', 'http://yakata.com')->delete();
      $user->delete();
    }

    public function testAddNewVideoWithValidData()
    {
      $user = factory(\App\User::class)->create([
          'name' => 'John Doe',
          'email' => 'j_doe@gmail.com',
          'password' => bcrypt('hayakiri')
        ]);

      $this->actingAs($user)
      ->visit('/videos')
      ->click('Upload New Video')
      ->type('Learning Laravel', 'title')
      ->type('A brief introduction to laravel', 'description')
      ->type('Laravel, php, mvc, framework', 'category')
      ->type('https://www.youtube.com/watch?v=3u1fu6f8Hto', 'url')
      ->press('submit')
      ->see('Video Successfully Uploaded')
      ->seeInDatabase('videos', ['title' => 'Learning Laravel']);



      \App\Video::where('url', 'https://www.youtube.com/watch?v=3u1fu6f8Hto')->delete();
      $user->delete();
    }

    public function testEditExistingVideo()
    {
      $user = factory(\App\User::class)->create([
          'name' => 'John Doe',
          'email' => 'j_doe@gmail.com',
          'password' => bcrypt('hayakiri')
      ]);

      $video = factory(\App\Video::class)->create([
          'title' => 'Learning Laravel',
          'description' => 'Brief Introduction to Laravel',
          'category' => 'laravel',
          'url' => 'https://www.youtube.com/watch?v=3u1fu6f8Hto',
          'user_id' => $user->id,
          'slug' => 'brief-introduction-to-laravel'
      ]);


      $this->actingAs($user)
      ->visit('/videos/'.$video->slug."/edit");

      $user->videos()->delete();
      $user->delete();
    }

    public function testDeleteExistingVideo()
    {
      $user = factory(\App\User::class)->create([
          'name' => 'John Doe',
          'email' => 'j_doe@gmail.com',
          'password' => bcrypt('hayakiri')
      ]);

      $video = $user->videos()->create([
          'title' => 'Learning Laravel',
          'description' => 'Brief Introduction to Laravel',
          'category' => 'laravel',
          'url' => 'https://www.youtube.com/watch?v=3u1fu6f8Hto',
      ]);

      $video->slug = 'brief-introduction-to-laravel';
      $video->save();

      /**
      $this->actingAs($user)
      ->visit('videos')
      ->press("Delete Video")
      ->notSeeInDatabase('videos', [
        'title' => 'Learning Laravel',
        'description' => 'Not a brief introduction to laravel'
      ]);
      **/
      $video->delete();
      $user->delete();
    }
}
