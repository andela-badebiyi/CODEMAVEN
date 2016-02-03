<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function __construct()
    {
      $this->authorize('user-is-signed-in');
    }

    public function index(Request $request)
    {
      return view('user.settings', [
        'user' => $request->user(),
        'settings' => $request->user()->settings()->first()
      ]);
    }

    public function save(Request $request, Settings $settings)
    {
      $settings = $request->user()->settings()->first();

      $settings->disablemessages = $request->has('disablemessages') ?
                $request->input('disablemessages') : 0;

      $settings->donotnotifymessage = $request->has('donotnotifymessage') ?
                $request->input('donotnotifymessage') : 0;

      $settings->save();

      return redirect()->back()->with('message','settings has been saved');
    }
}
