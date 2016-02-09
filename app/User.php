<?php

namespace App;
use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Model class for User
 */
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array'
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function likes()
    {
      return $this->hasMany('App\Like');
    }

    public function comments()
    {
      return $this->hasMany('App\Comment');
    }

    public function messages()
    {
        return $this->hasMany('App\Message', 'reciever_id');
    }

    public function settings()
    {
      return $this->hasOne('App\Settings', 'user_id');
    }

    /**
     * Returns the total number of comments on all the videos
     * of a particular user
     *
     * @return int
     */
    public function allCommentsOnVideos()
    {
      $count = 0;
      $alluservideos = Auth::user()->videos()->get();

      foreach ($alluservideos as $video) {
        $count += count($video->comments()->get());
      }
      return $count;
    }

    /**
     * Returns the total number of video views on all a user's videos
     *
     * @return int
     */
    public function allVideoViews()
    {
      $count = 0;
      $alluservideos = Auth::user()->videos()->get();

      foreach($alluservideos as $videos) {
        $count += intval($videos->view_count);
      }
      return $count;
    }
}
