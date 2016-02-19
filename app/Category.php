<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function videos()
    {
      return $this->hasMany('App\Video', 'category_id');
    }
}
