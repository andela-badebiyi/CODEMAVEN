<?php

namespace App\Http\Controllers;

use App\Http\Requests\VidRequest;
use App\VideoRequest;
use Illuminate\Http\Request;

/**
 * Controller class to handle tutorial video request made
 * by guests.
 */
class VideoRequestController extends Controller
{
    /**
     * Displays the video request page.
     */
    public function index(Request $request)
    {
        return view('videorequest');
    }

    /**
     * Save a new video request.
     */
    public function save(VidRequest $request, VideoRequest $videorequest)
    {
        //save new request into database
      $videorequest->create($request->all());

        return redirect()->back()->with('message',
        'Your request has been posted');
    }

    /**
     * Form to resolve a video request.
     */
    public function resolveRequest(Request $request, $request_id)
    {
        $this->authorize('user-is-signed-in');

        return view('videorequest.request_form', [
        'user'    => $request->user(),
        'request' => VideoRequest::findOrFail($request_id),
        'categories' => \App\Category::lists('name', 'id')
      ]);
    }
}
