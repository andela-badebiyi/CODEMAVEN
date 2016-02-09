<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

/**
 * Controller class for user account settings.
 */
class SettingsController extends Controller
{
    /**
     * Ensures that only signed-in users has access to this
     * controller function.
     */
    public function __construct()
    {
        $this->authorize('user-is-signed-in');
    }

    /**
     * Display settings page.
     */
    public function index(Request $request)
    {
        return view('user.settings', [
        'user'     => $request->user(),
        'settings' => $request->user()->settings()->first(),
      ]);
    }

    /**
     * Save settings.
     */
    public function save(Request $request, Settings $settings)
    {
        //fetch current signed user
      $user = $request->user();

      //check that username was changed and proceed to update
      if (trim($request->input('username')) !== $user->username) {
          //confirm that the field isn't blank and that the username is unique
        $this->validate($request, [
          'username' => 'required|unique:users,username',
        ]);

        //update username and save
        $user->username = $request->input('username');
          $user->save();
      }

      //update other settings and save
      $settings = $user->settings()->first();

        $settings->disablemessages = $request->has('disablemessages') ?
                $request->input('disablemessages') : 0;

        $settings->donotnotifymessage = $request->has('donotnotifymessage') ?
                $request->input('donotnotifymessage') : 0;

        $settings->save();

      //redirect back with success message
      return redirect()->back()->with('message', 'settings has been saved');
    }
}
