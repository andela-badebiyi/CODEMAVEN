<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
	public function __construct()
	{
		$this->authorize('user-is-signed-in');
	}

    public function getVideos()
    {
    	return view('user.videos');
    }
}
