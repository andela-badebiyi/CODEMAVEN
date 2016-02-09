<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model class for video tutorial requests
 */
class VideoRequest extends Model
{
	//table name
	protected $table = 'videorequests';

	//mass assignable properties
	protected $fillable = [
	'description',
	'requester_name',
	'requester_email',
	'request_status',
	];
}
