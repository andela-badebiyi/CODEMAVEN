<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class CommentController extends Controller
{
    public function store(Request $request, $video_id, Comment $comment)
    {
      $comment->create([
        'user_id' => Auth::check() ? $request->user()->id : 0,
        'video_id' => $video_id,
        'author' => Auth::check() ? $request->user()->name : $request->input('author'),
        'body' => $request->input('body'),
      ]);
      return redirect()->back()->with('message-comment', 'Comment Posted!');
    }

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

    public function destroy(Request $request, $video_id)
    {

    }
}
