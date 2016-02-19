<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class label extends Model
{
    public function Dvd(){
        return $this->hasMany('App\Models\Dvd');
    }
}
