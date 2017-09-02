<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {    
        return $this->belongTo('App\User');
    }

    public function story()
    {    
        return $this->belongTo('App\Story');
    }
}
