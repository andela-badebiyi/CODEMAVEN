<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Socialize;
use App\User;
use Auth;

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

    private function registerUser($data) 
    {
    	$user = new User;
    	//register user
    	$user->email = $data->id;
    	$user->avatar = $data->avatar;
    	$user->name = $data->name;
    	$user->password = md5($this->generatePassword());
    	$user->save();

    	//log user in
    	Auth::loginUsingId($user->id);

    	//store avatar in session
    	session(['avatar' => $data->avatar]);
    }

    private function logUserIn($data)
    {
    	//fetch person
    	$person = User::where('email', $data->id)->get()->first();

    	//log person in
    	Auth::loginUsingId($person->id);

    	//store avatar in session
    	session(['avatar' => $data->avatar]);
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
}
