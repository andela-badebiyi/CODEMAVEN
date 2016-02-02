<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;
use App\Http\Requests\UpdateProfilePostRequest;
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

	public function getProfile(Request $request)
	{
		return view('user.editProfile', ['user' => $request->user()]);
	}

	public function postProfile(UpdateProfilePostRequest $request)
	{
		//fetch user object
		$user = User::where('id', $request->user()->id);

		//construct the update fields
		$data = $this->generateUpdateData($request->all());

		//if file was uploaded, save file
		if ($request->hasFile('avatar')) {
			$name = str_replace(' ', '', $request->user()->name);
			$public_id = "{$name}-{$request->user()->id}";
			$tmp_avatar_path = $request->file('avatar')->getPathName();
			$result = $this->upload($tmp_avatar_path, $public_id);
			$data['avatar'] = $result['url'];
		}

		//update user details
		$user->update($data);

		//redirect back to profile page
		return redirect()->back()->with('message', 'Update Successful!');
		
	}

	public function userSettings(Request $request)
	{
		return view('user.settings', ['user' => $request->user()]);
	}

	private function generateUpdateData($data)
	{
		$output = [];
		foreach ($data as $key => $value) {
			if ( ($value !== '' || !isset($value)) && $key !== '_token' ){
				$output[$key] = $value;
			}
		}
		return $output;
	}

    private function upload($filepath, $public_id)
    {
        $res = \Cloudinary::config([
          'cloud_name' => 'ddnvpqjmh',
          'api_key' => '911597418222643',
          'api_secret' => 'qgnRvc9ACfuMQjrm2dNmrKTCYqc',
        ]);
        $upload = \Cloudinary\Uploader::upload(
        	$filepath,
        	[
        		'public_id' => $public_id,
	        	"crop" => "fill", 
	        	"width" => "300", 
	        	"height" => "300"
        	]
        );
        return $upload;
    }
}
