<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'category', 'url',
    ];

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function youtubeID()
    {
        return substr($this->url, strpos($this->url, '=') + 1);
    }

    /**
     * Checks whether a video has already being liked by a user.
     *
     * @param int $user_id  ID of user
     * @param int $video_id ID of video
     *
     * @return bool true if video has already been liked and false if otherwise
     */
    public static function userHasAlreadyLikedVideo($user_id, $video_id)
    {
        return count(Like::where('user_id', $user_id)
      ->where('video_id', $video_id)
      ->get()) > 0 ? true : false;
    }
}
