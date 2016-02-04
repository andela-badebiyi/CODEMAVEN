<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Video;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function __construct(){
      $this->authorize('user-is-signed-in');
    }

    public function like(Request $request, $video_id)
    { 
        $output = 0;
        if (Video::userHasAlreadyLikedVideo($request->user()->id, $video_id)) {
          $this->unlikeVideo($request->user(), $video_id);
          $output=1;
        } else {
          $this->likeVideo($request->user(), $video_id);
          $output=2;
        }
        if ($request->ajax()) {
          return $output;
        } else {
          return redirect()->back();  
        }
        
    }

    private function likeVideo($user, $video_id)
    {
      Like::create([
        'user_id' => $user->id,
        'video_id'=> $video_id,
        'like' => 1
      ]);
    }

    private function unlikeVideo($user, $video_id)
    {
      Like::where('user_id', $user->id)
      ->where('video_id', $video_id)
      ->delete();
    }
}
