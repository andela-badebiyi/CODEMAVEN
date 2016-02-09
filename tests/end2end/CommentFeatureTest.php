<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommentFeatureTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddCommentWithWrongData()
    {
      //create user
      $user = factory(\App\User::class)->create();

      //create video
      $video = factory(\App\Video::class)->create([
        'user_id' => $user->id
      ]);

      //post a comment without been signed in and no data
      $this->visit('/videos/'.$video->slug)
      ->press('Post Comment')
      ->see('The author field is required')
      ->see('The body field is required.');

      //post a comment whiled signed in with invalid data
      $this->actingAs($user)
      ->visit('/videos/'.$video->slug)
      ->press('Post Comment')
      ->see('The body field is required.');

      //clean up database
      $user->videos()->delete();
      $user->delete();
    }

    public function testAddCommentWithCorrectData()
    {
      //create user
      $user = factory(\App\User::class)->create();

      //add video
      $video = factory(\App\Video::class)->create([
        'user_id' => $user->id
      ]);

      //post comment
      $this->actingAs($user)
      ->visit('/videos/'.$video->slug)
      ->type('Yaa yaa', 'body')
      ->press('Post Comment')
      ->see('Comment Posted!')
      ->seeInDatabase('comments', [
        'body' => 'Yaa yaa'
      ]);

      //post comment reply
      $this->actingAs($user)
      ->visit('/videos/'.$video->slug)
      ->click('reply')
      ->type('what does this mean', 'body')
      ->press('Reply')
      ->see('Reply Posted!')
      ->seeInDatabase('comments', [
        'body' => 'what does this mean',
      ]);

      //clean up database
      $user->comments()->delete();
      $user->videos()->delete();
      $user->delete();
    }
}
