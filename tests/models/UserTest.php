<?php

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function testUserRelationships()
    {
        $this->assertHasMany('videos', \App\User::class);
        $this->assertHasMany('likes', \App\User::class);
        $this->assertHasMany('comments', \App\User::class);
        $this->assertHasMany('messages', \App\User::class);
        $this->assertHasOne('settings', \App\user::class);
    }

    public function testCreateUser()
    {
        $user = User::create([
                'name'     => 'Bodunde Adebiyi',
                'email'    => 'bodunadebiyi@gmail.com',
                'password' => md5('opheopgus'),
            ]);

        $this->seeInDatabase('users', [
                'name'     => 'Bodunde Adebiyi',
                'email'    => 'bodunadebiyi@gmail.com',
                'password' => md5('opheopgus'),
            ]);

        $user->delete();
    }

    public function testUserAllCommentsOnVideosMethod()
    {
        $usr = Mockery::mock(\App\User::class);
        $usr->shouldReceive('allCommentsOnVideos')
                    ->once()
                    ->andReturn(4);

        $this->assertSame($usr->allCommentsOnVideos(), 4);
    }

    public function testUserAllVideoViews()
    {
        $usr = Mockery::mock('User');
        $usr->shouldReceive('allVideoViews')
                    ->once()
                    ->andReturn(4);

        $this->assertSame($usr->allVideoViews(), 4);
    }
}
