<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UploadVideoRequest;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
	public function __construct()
	{
		$this->authorize('user-is-signed-in');
	}

    public function index(Request $request)
    {
    	return view('videos.index', [
    		'user' => $request->user(),
    		'videos' => $request->user()->videos()->get()
    	]);
    }

    public function create(Request $request)
    {
    	return view('videos.create',[
    		'user' => $request->user(),
    	]);
    }

    public function store(UploadVideoRequest $request)
    {
    	$request->user()->videos()->create($request->all());
    	return redirect('videos')->with(['message' => 'Video Successfully Uploaded']);
    }
}
