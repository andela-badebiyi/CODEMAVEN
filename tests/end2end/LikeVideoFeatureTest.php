<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LikeVideoFeatureTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLikeVideo()
    {
        //create a user
        $user = factory(\App\User::class)->create([
          'name' => 'John Doe',
          'email' => 'j_doe@gmail.com',
          'password' => bcrypt('hayakiri'),
          'username' => 'jdoe_1'
        ]);

        //create a videos
        $video = factory(\App\Video::class)->create([
          'title' => 'learning php',
          'user_id' => $user->id
        ]);

        //like video
        $this->actingAs($user)
        ->visit('videos/'.$video->slug)
        ->click('like')
        ->see('1')
        ->click('like')
        ->see(0);

        //clear database
        $user->videos()->delete();
        $user->delete();
    }
}
