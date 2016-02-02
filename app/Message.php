<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $fillable = ['email', 'sender_name', 'subject', 'message','status'];

    public function owner()
    {
    	return $this->belongsTo('App\User', 'reciever_id');
    }
}
