<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VideoRequestFeatureTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testMakeRequestIndexPage()
    {
      $this->visit('/request')
        ->see('Make A request');
    }

    public function testRequestWithNoData()
    {
      $this->visit('/request')
        ->press('submit')
        ->see('The description field is required');
    }

    public function testVideoRequestWithIncompleteData()
    {
      $this->visit('/request')
        ->type('Bodunde Adebiyi', 'requester_name')
        ->type('bodunadebiyi@gmail.com', 'requester_email')
        ->press('submit')
        ->see('The description field is required');
    }

    public function testVideoRequestWithCompleteData()
    {
      $this->visit('/request')
        ->type('Bodunde Adebiyi', 'requester_name')
        ->type('bodunadebiyi@gmail.com', 'requester_email')
        ->type('I need a laravel video', 'description')
        ->press('submit')
        ->see('Your request has been posted');

      $this->seeInDatabase('videorequests', [
        'requester_name' => 'Bodunde Adebiyi',
        'requester_email' => 'bodunadebiyi@gmail.com'
      ]);

      \App\VideoRequest::where('requester_email', 'bodunadebiyi@gmail.com')->delete();
    }
}
