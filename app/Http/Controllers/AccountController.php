<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Socialize;
use App\User;
use Auth;
use App\Settings;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 *  Controller class that handles Social Media Authentication
 *
 */

class AccountController extends Controller
{
    /**
     * callback that recieves user data after registering with
     * the social media
     *
     * @param $provider string name of the social media e.g twitter, facebook, github
     */
    public function callback($provider)
    {
        //recieve user data after social authentication
    	$user = Socialize::driver($provider)->user();

        //register a new user or login an existing user
    	$this->createOrLogin($user);

        //redirect user to dashboard
    	return redirect('dashboard');
    }

    /**
     * function that makes the Social authentication request
     *
     * @param $provider string name of the social media e.g twitter, facebook, github
     */
    public function socialAuth($provider)
    {
    	return Socialize::driver($provider)->redirect();
    }

    /**
     * Checks if a user already exists, if it does it logs a user in
     * if it doesn't it registers the new user
     *
     * @param $data Array the data of the user
     * @return null
     */
    private function createOrLogin($data)
    {
    	//check whether to create new user or log user in
    	if (User::where('email', $data->id)->get()->first() == null) {
    		$this->registerUser($data);
    	} else {
    		$this->logUserIn($data);
    	}

    }

    /**
     * Registers a new user
     *
     * @param $data Array the data of the user that is to be registered
     */
    private function registerUser($data)
    {
        $settings = new Settings;
    	$user = new User;

    	//register user
    	$user->email = $data->id;
    	$user->avatar = $data->avatar;
    	$user->name = $data->name;
    	$user->password = md5($this->generatePassword());
    	$user->save();

        //save auto_generated username
        $user->username = $this->generateUsername($user);
        $user->save();

        //set user default settings
        $settings->user_id = $user->id;
        $settings->donotnotifymessage = 0;
        $settings->disablemessages = 0;
        $settings->save();

    	//log user in
    	Auth::loginUsingId($user->id);
    }

    /**
     * Log an already registered user in
     *
     * @param $data Array the data of the user that is to be logged in
     */
    private function logUserIn($data)
    {
        //fetch person
    	$person = User::where('email', $data->id)->get()->first();

    	//log person in
    	Auth::loginUsingId($person->id);
    }

    /**
     * Generate a random password for users that register
     * via social Auth
     *
     * @param $length int the length of the password to be generated
     * @return String the randomly generated password
     */
    private function generatePassword($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
    	return $randomString;
	}

    /**
     * Generates a username for a user, using the user's name and ID
     *
     * @param String $user the user data
     * @return String newly constructed usernaeme
     */
    private function generateUsername($user)
    {
      $name = strtolower(str_replace(' ', '', $user->name));
      return "{$name}_{$user->id}";
    }
}
