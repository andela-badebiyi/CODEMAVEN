<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AccountControllerRoutesTest extends TestCase
{
    use DatabaseMigrations;
    public function testAccountControllerRoute()
    {
      /**
      $response = $this->call('get', '/login/twitter');
      $this->assertResponseOk();

      $response = $this->call('get', '/login/facebook');
      $this->assertResponseOk();

      $response = $this->call('get', '/login/github');
      $this->assertResponseOk();
      **/
    }
}
