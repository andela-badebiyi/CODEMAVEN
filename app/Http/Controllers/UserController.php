<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function __construct()
	{
		$this->authorize('user-is-signed-in');
	}

	public function getDashboard(Request $request)
	{
		return view('user.dashboard', ['user' => $request->user()]);
	}
}
