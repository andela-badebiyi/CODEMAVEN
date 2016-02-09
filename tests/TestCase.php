<?php
use Way\Tests\ModelHelpers;
use Illuminate\Foundation\Testing\DatabaseMigrations;
class TestCase extends Illuminate\Foundation\Testing\TestCase
{
  use ModelHelpers;
  use DatabaseMigrations;
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://code.maven.com';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }
}
