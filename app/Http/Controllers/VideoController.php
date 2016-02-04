<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Video;
use App\VideoRequest;
use App\Http\Requests;
use App\Http\Requests\UploadVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{


    public function index(Request $request)
    {
		$this->authorize('user-is-signed-in');
    	return view('videos.index', [
    		'user' => $request->user(),
    		'videos' => $request->user()->videos()->get()
    	]);
    }

    public function create(Request $request)
    {
		$this->authorize('user-is-signed-in');
    	return view('videos.create',[
    		'user' => $request->user(),
    	]);
    }

	public function show(Request $request, $slug)
	{
		$video = Video::where('slug', $slug)->firstOrFail();
		$video->increment('view_count');

		return view('videos.show', [
			'user' => $request->user(),
			'video' => $video,
			'comments' => $video->comments()
			->where('reply_id', 0)
			->get()
		]);
	}

	public function edit(Request $request, $slug)
	{
		$this->authorize('user-is-signed-in');
		return view('videos.edit', [
			'video' => Video::where('slug', $slug)->firstOrFail(),
			'user' => $request->user()
		]);
	}

    public function store(UploadVideoRequest $request)
    {
		$this->authorize('user-is-signed-in');
		
		//store video
		$video = $request->user()->videos()->create($request->all());

		//create unique slug from video title and unique id and save
		$video->slug = $this->createSlug($video);
		$video->save();

		//if its resolving a request, send an email notification
		if($request->has('request_id')){
			$req = VideoRequest::find($request->input('request_id'));
			$req->request_status = 1;
			$req->resolver_id = $request->user()->id;
			$req->save();
			$this->sendEmailNotification($req, $video);
			return redirect()->back()->with('message', 'you have resolved '.$req->requester_name."'s request");
		} else {
			return redirect('videos')->with(['message' => 'Video Successfully Uploaded']);
		}
    }

		public function update(UpdateVideoRequest $request, $slug)
		{
			$this->authorize('user-is-signed-in');
			$video = Video::where('slug', $slug)->firstOrFail();

			$this->authorize('user-owns-video', $video);
			//fetch video and update
			$updateData = $this->generateUpdateData($request->all());

			//update video
			$video->update($updateData);

			//update slug
			if ($request->has('title')) {
				$video->slug = $this->createSlug($video);
				$video->save();
			}

			return redirect('videos')->with(['message' => 'Video Successfully Updated']);
		}

		public function destroy(Request $request, $slug)
		{
			$this->authorize('user-is-signed-in');
			$video = Video::where('slug', $slug)->firstOrFail();
			$this->authorize('user-owns-video', $video);


			$title = $video->title;
			$video->delete();

			return redirect('videos')->with(['message' => "The video '{$title}' has been Successfully deleted!"]);
		}

		private function createSlug($video)
		{
			return str_replace(' ', '-', $video->title) . '-' . $video->id;
		}

		private function generateUpdateData($data)
		{
			$output = [];
			foreach ($data as $key => $value) {
				if ( (trim($value) !== '' || !isset($value)) && $key !== '_token' ){
					$output[$key] = $value;
				}
			}
			return $output;
		}

		private function sendEmailNotification($recepient, $video)
		{
	        $data['email'] = $recepient->requester_email;
	        $data['name'] = $recepient->requester_name;
	        $data['subject'] = "Code-Maven: Your video request has been granted";
	        $data['link'] = url('/videos/'.$video->slug);

	        Mail::send('mails.request_notification', $data, function($message) use ($data){
	            $message->to($data['email']);
	            $message->subject($data['subject']);
	        });
		}
}
