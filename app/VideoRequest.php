<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoRequest extends Model
{
  protected $table = 'videorequests';
  
  protected $fillable = [
    'title',
    'description',
    'requester_name',
    'requester_email',
    'request_status',
  ];
}
