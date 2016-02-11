<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Notifier\MailNotification;

class MailNotificationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testMailNotification()
    {
        $notify = Mockery::mock(MailNotification::class);
        $notify
        ->shouldReceive('send')
        ->once()
        ->andReturn(true);

        $this->assertEquals(true, $notify->send());
    }
}
