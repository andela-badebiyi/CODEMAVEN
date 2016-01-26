<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Socialize;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function callback($provider)
    {
    	$user = Socialize::driver($provider)->user();
    	dd($user);
    }

    public function socialAuth($provider)
    {
    	return Socialize::driver($provider)->redirect();
    }
}
