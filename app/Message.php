<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model class for messages.
 *
 * @property int $id
 * @property string $sender_name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property int $status
 * @property int $receiver_id
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Message extends Model
{
    protected $fillable = ['email', 'sender_name', 'subject', 'message', 'status'];

    public function owner()
    {
        return $this->belongsTo('App\User', 'reciever_id');
    }
}
