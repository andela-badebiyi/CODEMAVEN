<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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
}
