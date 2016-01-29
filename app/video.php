<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'category', 'url'
    ];
}
