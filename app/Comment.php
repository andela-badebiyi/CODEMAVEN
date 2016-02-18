<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model class for my comments.
 *
 * @property int $id
 * @property string $author
 * @property string $body
 * @property int $user_id
 * @property int $video_id
 * @property int $reply_id
 * @property DateTime $created_at
 * @property DateTIme $updated_at
 */
class Comment extends Model
{
    //properties that are mass assignable
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
