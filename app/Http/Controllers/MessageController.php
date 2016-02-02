<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Mail;
use App\User;
use App\Message;
use App\Http\Requests;
use App\Http\Requests\SendMessageRequest;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function create($username)
    {
    	$user = User::where('username', $username)->firstOrFail();
    	return view('user_messages', [
    		'user' => $user
    	]);
    }

    public function store($username, SendMessageRequest $request, Message $message)
    {
    	//fetch recepient
    	$recepient = User::where('username', $username)->firstOrFail();

    	//populate fields
    	$message->reciever_id = $recepient->id;
    	$message->sender_name = $request->input('name');
    	$message->email = $request->input('email');
    	$message->subject = $request->input('subject');
    	$message->message = $request->input('message');

    	//save message and redirect
    	$message->save();
    	return redirect()->back()->with('message', "Your message has been sent to {$recepient->name}!");
    }

    public function showMessages(Request $request)
    {
    	$this->authorize('user-is-signed-in');

    	$messages = $request->user()->messages()->orderBy('updated_at', 'desc')->get();

    	return view('user.messages', [
    		'user' => $request->user(),
    		'messages' => $messages
    	]);
    }

    public function displayMessage(Request $request, $message_id)
    {
      //fetch message or echo 404 if not found
    	$message = Message::findOrFail($message_id);

      //confirm that the user is authorized to view the message
    	$this->authorize('user-is-signed-in');
    	$this->authorize('user-owns-message', $message);

      //change mesage status to read
      DB::table('messages')
      ->where('id', $message->id)
      ->update(['status'=>1]);

      //display the message
    	return view('user.display_message', [
    		'user' => $request->user(),
    		'message' => $message
    	]);
    }

    public function sendReply(Request $request)
    {
        $recepient['email'] = $request->input('email');
        $recepient['body'] = $request->input('message');
        $recepient['subject'] = "Reply: ".$request->input('subject');

        //dd($recepient);

        Mail::send('user.message_view', $recepient, function($message) use ($recepient){
            $message->from('noreply@noreply.com');
            $message->to($recepient['email']);
            $message->subject($recepient['subject']);
        });

        return redirect()->back()->with('message', 'Reply Sent');

    }

    public function destroy(Request $request, $message_id)
    {
      //fetch message
      $message = Message::where('id', $message_id)->firstOrFail();

      //confirm that the user is authorized to view the message
      $this->authorize('user-is-signed-in');
      $this->authorize('user-owns-message', $message);

      //delete message
      $message->delete();

      //redirect to the messages
      return redirect('/messages')->with('message', 'message deleted successfully');
    }
}
