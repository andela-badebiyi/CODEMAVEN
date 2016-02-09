<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('validYoutubeUrl', function ($attribute, $value, $parameters, $validator) {
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', 'https://www.youtube.com/oembed?format=json&url='.$value,
                ['exceptions' => false]);

            return $res->getStatusCode() == 200 ? true : false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
