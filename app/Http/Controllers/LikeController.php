<?php

namespace App\Http\Controllers;

use App\Like;
use App\Video;
use Illuminate\Http\Request;

/**
 * Controller class that controls the like and unlike feature.
 */
class LikeController extends Controller
{
  /**
   * Prevents unauthenticated users from accessing any of the controller
   * methods.
   */
  public function __construct()
  {
    $this->authorize('user-is-signed-in');
  }

  /**
   * resolves a like/unlike request.
   *
   * @param int $video_id The ID of the video that is to be liked/unliked
   */
  public function like(Request $request, $video_id)
  {
    //output used to determine if a like or unlike action took place
    $output = 0;

    //if video has already being liked by user then unlike, else like
    if (Video::userHasAlreadyLikedVideo($request->user()->id, $video_id)) {
      $this->unlikeVideo($request->user(), $video_id);
      $output = 1;
    } else {
      $this->likeVideo($request->user(), $video_id);
      $output = 2;
    }

    //if its an ajax request echo $output else redirect back to previous page
    if ($request->ajax()) {
      return $output;
    } else {
      return redirect()->back();
    }
  }

  /**
   * Function to like a video.
   *
   * @param User $user user model object
   * @param int $video_id the id of the video to be liked
   */
  private function likeVideo($user, $video_id)
  {
    Like::create([
      'user_id'  => $user->id,
      'video_id' => $video_id,
      'like'     => 1,
    ]);
  }

  /**
   * Function to unlike a video.
   *
   * @param User $user user model object
   * @param int $video_id the id of the video to be liked
   */
  private function unlikeVideo($user, $video_id)
  {
    Like::where('user_id', $user->id)
    ->where('video_id', $video_id)
    ->delete();
  }
}
