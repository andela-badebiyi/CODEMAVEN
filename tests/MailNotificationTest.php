<?php

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
