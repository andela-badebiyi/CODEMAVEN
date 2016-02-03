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

class AccountController extends Controller
{
    public function callback($provider)
    {
    	$user = Socialize::driver($provider)->user();
    	$this->createOrLogin($user);
    	return redirect('dashboard');
    }

    public function socialAuth($provider)
    {
    	return Socialize::driver($provider)->redirect();
    }

    private function createOrLogin($data)
    {
    	//check whether to create new user or log user in
    	if (User::where('email', $data->id)->get()->first() == null) {
    		$this->registerUser($data);
    	} else {
    		$this->logUserIn($data);
    	}

    }

    private function registerUser($data, Settings $settings)
    {
        $this->clearAvatarSession();

    	$user = new User;
    	//register user
    	$user->email = $data->id;
    	$user->avatar = $data->avatar;
    	$user->name = $data->name;
    	$user->password = md5($this->generatePassword());
    	$user->save();

      //store auto_generated username
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

    private function logUserIn($data)
    {
    	$this->clearAvatarSession();

        //fetch person
    	$person = User::where('email', $data->id)->get()->first();

    	//log person in
    	Auth::loginUsingId($person->id);
    }

    private function generatePassword($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
    	return $randomString;
	}

    private function clearAvatarSession()
    {
        if (session()->has('avatar')) {
            session()->forget('avatar');
        }
    }

    private function generateUsername($user)
    {
      $name = strtolower(str_replace(' ', '', $user->name));
      return "{$name}_{$user->id}";
    }
}
