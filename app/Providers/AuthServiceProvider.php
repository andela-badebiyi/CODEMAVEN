<?php

namespace App\Providers;
use Auth;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('user-is-signed-in', function(){
            return Auth::check();
        });

        $gate->define('user-owns-video', function($user, $video){
          return $user->id === $video->user_id;
        });

        $gate->define('user-owns-message', function($user, $message){
            return $user->id == $message->reciever_id;
        });
    }
}
