<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VideoRequest;
use App\Http\Requests;
use App\Http\Requests\VidRequest;
use App\Http\Controllers\Controller;

class VideoRequestController extends Controller
{
    public function index(Request $request)
    {
      return view('videorequest');
    }

    public function save(VidRequest $request, VideoRequest $videorequest)
    {
      $videorequest->create($request->all());

      return redirect()->back()->with('message',
        'Your request has been posted');
    }

    public function resolveRequest(Request $request, $request_id)
    {
      return view('videorequest.request_form', [
        'user' => $request->user(),
        'request' => VideoRequest::find($request_id)
      ]);
    }
}
