<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Video;

class VideoTest extends TestCase
{
    use DatabaseMigrations;
    public function testVideoRelationships()
    {
      //$this->assertBelongsTo('owner', \App\Video::class);
      $this->assertHasMany('likes', \App\Video::class);
      $this->assertHasMany('comments', \App\Video::class);
    }

    public function testYoutubeID()
    {
      $video = Mockery::mock(\App\Video::class);
      $video->shouldReceive('youtubeID')
          ->once()
          ->andReturn('3u1fu6f8Hto');

      $this->assertSame($video->youtubeID(), '3u1fu6f8Hto');

    }
}
