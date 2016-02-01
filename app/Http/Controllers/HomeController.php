<?php

namespace App\Http\Controllers;
use App\User;
use App\Video;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function allVideos()
    {
      $videos = Video::all();
      return view('videos', ['videos' => $videos]);
    }

    public function userProfile($username)
    {
      $user = User::where('username', $username)->firstOrFail();
      return view('user_profile', ['user' => $user]);
    }

    public function userVideos($username)
    {
      $user = User::where('username', $username)->firstOrFail();
      return view('user_videos', [
        'user' => $user,
        'videos' => $user->videos()->get()
      ]);
    }

    public function searchVideos(Request $request)
    {
      //remove whitespaces fromo query
      $query = trim($request->input('query'));

      //remove stop words from query
      $query = $this->removeStopWords($query);

      //generate the string to be used in the where clause
      $search = $this->generateWhereClause($query);

      //fetch videos
      $videos = Video::whereRaw($search)->get();
      
      return view('videos', [
        'videos' => $videos,
        'query' => $request->input('query')
        ]);
    }

    private function removeStopWords($query)
    {
       $stopWords = json_decode(file_get_contents(asset('stopwords.json')));
       $query = explode(' ', $query);
       return array_diff($query, $stopWords);
    }

    private function generateWhereClause($query)
    {
      $output = "";
      for($i = 0; $i < count($query); $i++) {
        $output .= "title like '%".$query[$i]."%' ";
        $output .= $i < (count($query) - 1) ? 'or ' : '';
      }
      return $output;
    }
}
