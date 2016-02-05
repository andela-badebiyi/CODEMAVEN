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

/**
 * Controller class that controls the messaging feature
 */
class MessageController extends Controller
{
    /**
     * Displays the send message form
     *
     * @param string $username the username of the recepient of the message
     */
    public function create($username)
    {
      //fetch recepient
    	$user = User::where('username', $username)->firstOrFail();

      //render view form
    	return view('user_messages', [
    		'user' => $user
    	]);
    }

    /**
     * Sends the message to the Maven
     *
     * @param string $usernamem the username of the recepient of the message
     */
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

    /**
     * Displays a users messages
     */
    public function showMessages(Request $request)
    {
      // Ensure that a user is signed in
    	$this->authorize('user-is-signed-in');

      //fetch users messages ordered by time
    	$messages = $request->user()->messages()->orderBy('updated_at', 'desc')->get();

      //render view that displays the message
    	return view('user.messages', [
    		'user' => $request->user(),
    		'messages' => $messages
    	]);
    }

    /**
     * Display a single message
     *
     * @param integer $message_id ID of the message to be displayed
     */
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

    /**
     * Send a reply to a message to the sender's email
     */
    public function sendReply(Request $request)
    {
      //construct associative array that would passed to view file
      $recepient['email'] = $request->input('email');
      $recepient['body'] = $request->input('message');
      $recepient['subject'] = "Reply from ".$request->user()->name;

      //send message
      Mail::send('mails.message_reply', $recepient, function($message) use ($recepient){
          $message->from('noreply@noreply.com');
          $message->to($recepient['email']);
          $message->subject($recepient['subject']);
      });

      //redirect back with a succcess message
      return redirect()->back()->with('message', 'Reply Sent!');

    }

    /**
     * Delete a message
     * @param integer $message_id 
     */
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
