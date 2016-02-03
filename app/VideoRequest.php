<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
      'title',
      'description',
      'requester_name',
      'requester_email',
      'request_status',
    ];
}
