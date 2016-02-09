<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

/**
 * Controller class that handles the posting of comments
 * and comment replies
 */
class CommentController extends Controller
{
  /**
   * Saves a posted comment
   *
   * @param int $video_id The ID of the video under which this comment was posted under
   */
  public function store(Request $request, $video_id, Comment $comment)
  {
    if (Auth::check()) {
      $this->validate($request, [
        'body' => 'required'
      ]);
    } else {
      $this->validate($request, [
        'author' => 'required',
        'body' => 'required'
      ]);
    }
    $comment->create([
      'user_id' => Auth::check() ? $request->user()->id : 0,
      'video_id' => $video_id,
      'author' => Auth::check() ? $request->user()->name : $request->input('author'),
      'body' => $request->input('body'),
    ]);
    return redirect()->back()->with('message-comment', 'Comment Posted!');
  }

  /**
   * Saves the reply to a comment
   *
   * @param int $video_id The ID of the video under which this comment was posted
   * @param int $comment_id The ID of the comment this comment is replying to
   */
  public function storeReply(Request $request, $video_id, $comment_id, Comment $comment)
  {
    $comment->create([
      'user_id' => Auth::check() ? $request->user()->id : 0,
      'video_id' => $video_id,
      'author' => Auth::check() ? $request->user()->name : $request->input('author'),
      'body' => $request->input('body'),
      'reply_id' => $comment_id
    ]);
    return redirect()->back()->with('message-comment', 'Reply Posted!');
  }
}
