<?php

namespace App\Http\Controllers;
use App\User;
use App\Video;
use App\Http\Requests;
use Illuminate\Http\Request;

/**
 * Controller class for the homepage and other actions
 * that doesn't require authentication
 */
class HomeController extends Controller
{
    /**
     * Show the welcome page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Shows the all videos page
     */
    public function allVideos()
    {
      //fetch all videos
      $videos = Video::all();

      //render view page
      return view('videos', ['videos' => $videos]);
    }

    /**
     * Shows the user profile page
     *
     * @param string $username The username of the user profile to be displayed
     */
    public function userProfile($username)
    {
      //fetch user
      $user = User::where('username', $username)->firstOrFail();

      //render view
      return view('user_profile', ['user' => $user]);
    }

    /**
     * List a users videos
     *
     * @param string $username The username of the user's video to be displayed
     */
    public function userVideos($username)
    {
      //fetch user
      $user = User::where('username', $username)->firstOrFail();

      //render view passing the user and videos object to the view
      return view('user_videos', [
        'user' => $user,
        'videos' => $user->videos()->get()
      ]);
    }

    /**
     * Resolves a search query and fetches videos 
     */
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

    /**
     * Removes stop words from search query
     *
     * @param string $query
     * @return array an array of the keywords
     */
    private function removeStopWords($query)
    {
       //fetch predefined stopwords from json file
       $stopWords = json_decode(file_get_contents(asset('stopwords.json')));

       //break query string into array
       $query = explode(' ', $query);

       //remove stop words and return new array
       return array_diff($query, $stopWords);
    }

    /**
     * Generates the where clause query string
     *
     * @param string $query 
     * @return string query string
     */
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
