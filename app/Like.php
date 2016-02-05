<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model class for my Video Likes
 *
 * @property integer $id
 * @property integer $like
 * @property integer $user_id
 * @property integer $video_id
 * @property DateTime $created_at
 * @property DateTIme $updated_at
 */
class Like extends Model
{
    //mass assignable properties
    protected $fillable = [
        'user_id', 'video_id', 'like'
    ];

    public function video()
    {
      return $this->belongsTo('App\Video', 'video_id');
    }

    public function owner()
    {
      return $this->belongsTo('App\User', 'user_id');
    }
}
