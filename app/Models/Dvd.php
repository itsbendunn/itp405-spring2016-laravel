<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dvd extends Model
{
    public function rating(){
        return $this->belongsTo('App\Models\rating');
    }

    public function genre(){
        return $this->belongsTo('App\Models\genre');
    }

    public function label(){
        return $this->belongsTo('App\Models\label');
    }

}
