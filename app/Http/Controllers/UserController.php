<?php

namespace App\Http\Controllers;

use App\Helpers\myhelpers;
use App\Http\Requests;
use App\Http\Requests\UpdateProfilePostRequest;
use App\User;
use App\VideoRequest;
use Illuminate\Http\Request;

/**
 * Controller class that controls all the features that are restricted
 * to authenticated users.
 */
class UserController extends Controller
{
    use myhelpers;

    /**
     * Ensures that only signed in users has access to this class' functions.
     */
    public function __construct()
    {
        $this->authorize('user-is-signed-in');
    }

    /**
     * Displays a signed-in users dashboard.
     */
    public function getDashboard(Request $request)
    {
        return view('user.dashboard', [
            'user'     => $request->user(),
            'requests' => VideoRequest::where('request_status', 0)->take(10)->get(),
        ]);
    }

    /**
     * Displays a signed-in users editable profile page.
     */
    public function getProfile(Request $request)
    {
        return view('user.editProfile', ['user' => $request->user()]);
    }

    /**
     * Save a users profile information.
     */
    public function postProfile(UpdateProfilePostRequest $request)
    {
        //fetch user object
        $user = User::where('id', $request->user()->id);

        //construct the update fields
        $data = $this->generateUpdateData($request->all());

        //if file was uploaded, save file
        if ($request->hasFile('avatar')) {
            //file name
            $name = str_replace(' ', '', $request->user()->name);

            //cloudinary public id for the image file
            $public_id = "{$name}-{$request->user()->id}";

            //get path to file
            $tmp_avatar_path = $request->file('avatar')->getPathName();

            //upload file to cloudinary
            $result = $this->upload($tmp_avatar_path, $public_id);

            //store the url of the image file gotten from cloudinary
            $data['avatar'] = $result['url'];
        }

        //update user details
        $user->update($data);

        //redirect back to profile page
        return redirect()->back()->with('message', 'Update Successful!');
    }

    /**
     * Display the user account settings page.
     */
    public function userSettings(Request $request)
    {
        return view('user.settings', ['user' => $request->user()]);
    }

    /**
     * Delete a users account.
     */
    public function deleteUser(Request $request)
    {
      //fetch user
      $user = $request->user();

      //prepare user for deleting
      $user->comments()->delete();

      //delete all videos comments
      $vid = $user->videos()->get();
      foreach ($vid as $v) {
        $v->comments()->delete();
      }
      $user->likes()->delete();
      $user->videos()->delete();
      $user->settings()->delete();
      $user->messages()->delete();

      //delete user and redirect to homepage
      $user->delete();

      return $request->ajax() ? 'done' : redirect('/');
    }
}
