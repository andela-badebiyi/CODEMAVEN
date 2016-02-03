<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use VideoRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VideoRequestController extends Controller
{
    public function index(Request $request)
    {
      return view('videorequest');
    }
}
