<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
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
