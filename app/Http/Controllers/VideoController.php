<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateVideoRequest;
use App\Http\Requests\UploadVideoRequest;
use App\Notifier\MailNotification;
use App\Video;
use App\VideoRequest;
use Illuminate\Http\Request;
use App\Helpers\myhelpers;

/**
 * Controller class that handles the uploading, editing
 * deleting and displaying of videos.
 */
class VideoController extends Controller
{
    use myhelpers;
    /**
     * Displays list of videos.
     */
    public function index(Request $request)
    {
        //ensure that the user is signed in
        $this->authorize('user-is-signed-in');

        //render view
        return view('videos.index', [
            'user'   => $request->user(),
            'videos' => $request->user()->videos()->get(),
        ]);
    }

    /**
     * Displays the upload form for a new video.
     */
    public function create(Request $request)
    {

        //ensure that the user is signed in
        $this->authorize('user-is-signed-in');

        //render video upload form view
        return view('videos.create', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Displays a single video and its comments.
     */
    public function show(Request $request, $slug)
    {
        //fetch video
        $video = Video::where('slug', $slug)->firstOrFail();

        //increase video view count
        $video->increment('view_count');

        //render view
        return view('videos.show', [
            'user'     => $request->user(),
            'video'    => $video,
            'comments' => $video->comments()
            ->where('reply_id', 0)
            ->get(),
        ]);
    }

    /**
     * Edit an uploaded video.
     */
    public function edit(Request $request, $slug)
    {
        $video = Video::where('slug', $slug)->firstOrFail();
        //ensure that user is signed in
        $this->authorize('user-is-signed-in');

    //confirm that user owns the video
    $this->authorize('user-owns-video', $video);

        //render view
        return view('videos.edit', [
            'video' => $video,
            'user'  => $request->user(),
        ]);
    }

    /**
     * Save an uploaded image.
     */
    public function store(UploadVideoRequest $request)
    {
        //ensure that user is signed in
        $this->authorize('user-is-signed-in');

        //store video
        $video = $request->user()->videos()->create($request->all());

        //create unique slug from video title and unique id and save
        $video->slug = $this->createSlug($video);
        $video->save();

        //if you are resolving a video tutorial request, send an email notification
    //@codeCoverageIgnoreStart
        if ($request->has('request_id')) {
            $req = VideoRequest::find($request->input('request_id'));
            $req->request_status = 1;
            $req->resolver_id = $request->user()->id;
            $req->save();
            @$this->sendEmailNotification($req, $video);

            return redirect()->back()->with('message', 'you have resolved '.$req->requester_name."'s request");
        } else {
            return redirect('videos')->with(['message' => 'Video Successfully Uploaded']);
        }
    //@codeCoverageIgnoreEnd
    }

    /**
     * Update an existing video details.
     *
     * @param string $slug unique slug of video to be deleted
     */
    public function update(UpdateVideoRequest $request, $slug)
    {
        //ensure that user is signed in
        $this->authorize('user-is-signed-in');

        //fetch video and throw 404 error if video isnt found
        $video = Video::where('slug', $slug)->firstOrFail();

        //confirm that user owns the video
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

    /**
     * Delete a video.
     *
     * @param string $slug unique slug of video to be deleted
     */
    public function destroy(Request $request, $slug)
    {
        //ensure user is signed in
        $this->authorize('user-is-signed-in');

        //fetch video
        $video = Video::where('slug', $slug)->firstOrFail();

        //ensure that user owns video
        $this->authorize('user-owns-video', $video);

        //delete video
        $title = $video->title;
        $video->delete();

        //redirect to videos index page with success message
        return redirect('videos')->with(['message' => "The video '{$title}' has been Successfully deleted!"]);
    }

    /**
     * Creates a unique slug for the video using the video title and unique id.
     *
     * @param Video $video
     *
     * @return string video slug
     */
    private function createSlug($video)
    {
        return str_replace(' ', '-', $video->title).'-'.$video->id;
    }

    /**
     * Sends an email notification.
     *
     * @param string $recpient the receiver of the email
     * @param Video  $video    video model instance
     *
     * @return null
     */

   //@codeCoverageIgnoreStart
    private function sendEmailNotification($recepient, $video)
    {
        //array that would be passed to the view
        $data['email'] = $recepient->requester_email;
        $data['name'] = $recepient->requester_name;
        $data['subject'] = 'Code-Maven:: Your video request has been granted';
        $data['body'] = "Your request has been resolved by one of our Maven's here is the link to the video ".url('/videos/'.$video->slug);

        //send email notification to recepient
        $notification = new MailNotification($data);
        $notification->send();
    }

    //@codeCoverageIgnoreEnd
}
