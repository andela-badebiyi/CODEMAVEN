<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VideoRequest;
use App\Http\Requests;
use App\Http\Requests\VidRequest;
use App\Http\Controllers\Controller;

/**
 * Controller class to handle tutorial video request made 
 * by guests 
 */
class VideoRequestController extends Controller
{
    /**
     * Displays the video request page
     */
    public function index(Request $request)
    {
      return view('videorequest');
    }

    /**
     * Save a new video request
     */
    public function save(VidRequest $request, VideoRequest $videorequest)
    {
      //save new request into database
      $videorequest->create($request->all());

      return redirect()->back()->with('message',
        'Your request has been posted');
    }

    /**
     * Form to resolve a video request
     */
    public function resolveRequest(Request $request, $request_id)
    {
      return view('videorequest.request_form', [
        'user' => $request->user(),
        'request' => VideoRequest::find($request_id)
      ]);
    }
}
