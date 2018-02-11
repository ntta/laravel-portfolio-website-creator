<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function postdetail()
    {
        return $this->hasMany('App\PostDetail');
    }
}
