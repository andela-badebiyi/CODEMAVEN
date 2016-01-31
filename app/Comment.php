<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'video_id', 'body', 'author', 'reply_id'];

    public function owner()
    {
      return $this->belongsTo('App\User', 'user_id');
    }

    public function video()
    {
      return $this->belongsTo('App\Video', 'video_id');
    }

    public function reply()
    {
      return $this->hasMany('App\Comment', 'reply_id');
    }
}
