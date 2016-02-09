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
      $user = factory(\App\User::class)->create();

      $video = factory(\App\Video::class)->create([
        'user_id' => $user->id
      ]);

      $this->actingAs($user)
      ->visit('/videos/'.$video->slug)
      ->press('Post Comment')
      ->see('The body field is required.');

      $this->visit('/videos/'.$video->slug)
      ->press('Post Comment')
      ->see('The body field is required.');

      $user->videos()->delete();
      $user->delete();
    }

    public function testAddCommentWithCorrectData()
    {
      $user = factory(\App\User::class)->create();

      $video = factory(\App\Video::class)->create([
        'user_id' => $user->id
      ]);

      $this->actingAs($user)
      ->visit('/videos/'.$video->slug)
      ->type('Yaa yaa', 'body')
      ->press('Post Comment')
      ->see('Comment Posted!')
      ->seeInDatabase('comments', [
        'body' => 'Yaa yaa'
      ]);

      $user->comments()->delete();
      $user->videos()->delete();
      $user->delete();
    }
}
